<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TheDocument;
use App\Models\InternalDocs;
use App\Models\ExternalDocs;
use App\Models\OutgoingDocs;
use App\Models\PpersonnelTable;
use App\Models\FileController;

use App\Models\TheOffice;
use App\Models\TheDivision;

use App\Http\Controllers\FileControllerController;
use setasign\Fpdi\Fpdi;

use Auth;
use Mail;
use \stdClass;

class EntrycontrolController extends Controller
{
    //
    function entry() {
        // $theoffice = TheOffice::get();
        $division    = [];
        $office      = [];
        $isrecords   = true;

        // $acct_type  = PpersonnelTable::where(["userid"=>Auth::id()])->get("typeofaccount")->toArray()[0];
        // $acct_type  = $acct_type['typeofaccount'];
        $acct_type     = PpersonnelTable::where(["userid"=>Auth::id()])->get();
        $acct_type     = $acct_type[0]->offtype->offtype;

        $briefernumber = $this->create_briefernumber();
        $barcodenumber = $this->create_barcodenumber();

        if ($acct_type == 1) {
            $division   = TheDivision::get();
            $office     = TheOffice::get();
        } else {
            $isrecords = false;
            // $info  = PpersonnelTable::where(["userid"=>Auth::id()])->get();

            // $divss = new stdClass();
            // foreach($info as $i) {
            //     $divss->divisionid      = $i->getdivs->divisionid;
            //     $divss->divisionname    = $i->getdivs->divisionname;

            //     array_push($division, $divss);
            // }
        }

        //dd($division);
    
        return view("windows.entry")->with(["division"=>$division,"offices"=>$office,"isrecords" => $isrecords, "brnum" => $briefernumber, "bcnum" => $barcodenumber]);
    }

    function enter_externaldocs() {
        $division    = [];
        $office      = [];
        $isrecords   = true;

        $division    = TheDivision::get();
        $office      = TheOffice::get();

        $briefernumber = $this->create_briefernumber();
        $barcodenumber = $this->create_barcodenumber();

        $isrecords   = false;
    
        return view("windows.routedoc")->with(["division"=>$division,"offices"=>$office,"isrecords" => $isrecords, "brnum" => $briefernumber, "bcnum" => $barcodenumber]);
    }

    function create_briefernumber() {
        return "br_".date("mdyhisA");
    }

    function create_barcodenumber() {
        return "bc_".date("mdyhisA");
    }

    function postentry(Request $req) {
        $thedocument                 = new TheDocument();
        $isrecords                   = true;
        $saved                       = false;
        /*
            incoming
            0 = not routed yet
            1 = routed to records
            2 = routed to OED
            3 = routed to OC
            4 = routed to office
            5 = routed to division
            6 = routed to employee
            7 = completed
        */

        // the document
        // $thedocument->datetoday      = $req->input("datetoday");
        $thedocument->datetoday      = date("Y-m-d");
        $thedocument->briefernumber  = $req->input("briefer-number");
        $thedocument->barcodenumber  = $req->input("barcode-number");
        $thedocument->documentcat    = $req->input("doccattype");
        $thedocument->docmgt         = $req->input("typeofdoc");
        $thedocument->subject        = $req->input("about");
        $thedocument->priority       = $req->input("priority_lvl");
        // $thedocument->updated_at     = date();
        // $thedocument->created_at     = date();
        $thedocument->save();

        // get the newly inserted ID
        $documentid = $thedocument->id;

        // type of document
        $typeofdoc   = $req->input("typeofdoc");
        
        $info        = PpersonnelTable::where(["userid"=>Auth::id()])->get()->toArray();

        if ($typeofdoc == "internal") {
            $division   = 0;
            $user       = 0;
            $office     = 0;

            if ($info[0]['typeofaccount'] != 1) {
                $isrecords  = false;
                $division   = $info[0]['divisionid'];
                $office     = $info[0]['officeid'];
                $user       = Auth::id();
            } else { // the records unit
                $isrecords  = true;
                $user       = $req->input("personnel");

                $user_dets  = PpersonnelTable::where(["userid"=>$user])->get()->toArray();
                $division   = $user_dets[0]['divisionid'];
                $office     = $user_dets[0]['officeid'];
            }

            $internal_docs               = new InternalDocs();
            $internal_docs->office       = $office; // $req->input("officeid");
            $internal_docs->division     = $division;
            $internal_docs->from         = $user; // 
            $internal_docs->to           = null;
            $internal_docs->actionneeded = null;
            $internal_docs->status       = null; //$info[0]['typeofaccount'];
            $internal_docs->documentid   = $documentid;

            if ($internal_docs->save()) {
                $saved = true;
            }
        }

        if ($typeofdoc == "external") {
            // use App\Models\InternalDocs;
            // use App\Models\ExternalDocs;
            // use App\Models\OutgoingDocs;

            $external_docs                    = new ExternalDocs();
            $external_docs->agencyfrom 	      = $req->input("agencyfrom");
            $external_docs->sendersname 	  = $req->input("sendersname");
            $external_docs->sendersemail 	  = $req->input("sendersemail");
            $external_docs->numberofcopy 	  = $req->input("numberofcopy");
            $external_docs->numberofpages 	  = $req->input("numberofpages");
            $external_docs->document_id       = $documentid;
            $external_docs->routeto 	      = null;
            $external_docs->status            = null; // $info[0]['typeofaccount'];

            if ($external_docs->save()) {
                $saved = true;

                $email_dets = [
                    "sendersemail" => $req->input("sendersemail"),
                    "about"        => $req->input("about"),
                    "barcode"      => $req->input("barcode-number"),
                    "url"          => "hello.com"
                ];
                // send email
                    Mail::raw('This email confirms that everything was set up correctly!', function ($message) use ($email_dets) { 
                        $message->to($email_dets['sendersemail'])
                                ->subject($email_dets['about']." has been routed with a tracking number of ".$email_dets['barcode'])
                                ->html("To track your document. Please visit ".$email_dets['url']);
                    }); 
            }
        }

        if ($typeofdoc == "outgoing") {
            $outgoingdocs                   = new OutgoingDocs();
            $outgoingdocs->officefrom 	    = $req->input("offices");
            $outgoingdocs->fromwhom 	    = $req->input("personnel");
            $outgoingdocs->toaddress 	    = $req->input("toaddress");
            $outgoingdocs->towhom           = $req->input("towhom");
            $outgoingdocs->toemailaddr 	    = $req->input("toemailaddr");
            $outgoingdocs->modeofrelease 	= $req->input("modeofrelease");
            $outgoingdocs->document_id 	    = $documentid;
            $outgoingdocs->status 	        = 7;

            if ($outgoingdocs->save()) {
                $saved = true;
            }
            // send through email
        }

        // upload file here
            $fileup = (new FileControllerController)->uploadfile($req,$req->input("barcode-number"));

                // $file     = $req->file("thefile");
                // $name     = date("mdy_hisA")."_".$file->getClientOriginalName();
                // $filepath = $file->storeAs('public\attachments', $name);

                $filesave                   = new FileController();
                $filesave->documentid       = $documentid;
                $filesave->thefile          = $fileup['name'];
                $filesave->thefilelocation  = $fileup['path'];
                $filesave->status           = 1;
                
                if ($filesave->save()) {
                    $saved = true;
                }
                
            // $filesaved = (new FileControllerController)->uploadfile($req);
        // upload file here

        $msg = "<div class='m-badge m-badge--danger m-badge--wide' style='width: 100%;border-radius: 0px !important;'><p style='font-size: 15px;padding: 9px;'>Something is wrong with the uploading of the document.</p></div>";
        if ($saved) {
            $msg = "<div class='m-badge m-badge--success m-badge--wide' style='width: 100%;border-radius: 0px !important;'><p style='font-size: 15px;padding: 9px;'>File successfully saved.</p></div>";
        }
        return redirect("/entry")->with(["message"=>$msg,"filepath"=>$fileup['path']]);
    }

    function autoupload(Request $req) {
        // upload file here
        $fileup                     = (new FileControllerController)->uploadfile($req,"new-file");

        $saved                      = false;
        $documentid                 = $req->input("docid");

        $filesave                   = new FileController();
        $filesave->documentid       = $documentid;
        $filesave->thefile          = $fileup['name'];
        $filesave->thefilelocation  = $fileup['path'];
        $filesave->status           = 1;
                
        if ($filesave->save()) {
            $saved = true;
        }
        
        return response()->json($saved);
    }

    function testcont() {
        echo (new FileControllerController)->display();
    }

}
