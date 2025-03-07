<?php

namespace App\Http\Controllers;

use App\Models\TheDocument;
use App\Models\InternalDocs;
use App\Models\ExternalDocs;
use App\Models\OutgoingDocs;
use App\Models\TheOffice;
use App\Models\TheDivision;
use App\Models\PpersonnelTable;
use App\Models\RemarksTable;
use App\Models\FootPrint;
use App\Models\User;
use App\Models\FileController;

use Auth;
use Mail;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TheDocumentController extends Controller
{
    //
    private $maturity = 1;
    function dashboard() {
        // $a = InternalDocs::where(["to"=>Auth::id(),"status"=>1])->get();

        // foreach($a as $aa) {
        //     echo $aa->getdocs->subject;
        // }
        
        // $acct_type  = PpersonnelTable::where(["userid"=>Auth::id()])->get("typeofaccount")->toArray()[0];
        // $acct_type  = $acct_type['typeofaccount'];
        
        $acct_type     = PpersonnelTable::where(["userid"=>Auth::id()])->get();

        if ($acct_type->count() == 0) {
            die("<h1 style='text-align: center;font-family: arial;margin-top: 30px;'> Your account is being configured. Please wait for the confirmation. </h1>");
        }

        $levelofaccess = $acct_type[0]->levelofaccess;
        $acct_type     = $acct_type[0]->offtype->offtype;
        
        // if ($acct_type == 1) {
        //     $internal   = $this->getinternal(["internal_docs.status" => 1,"the_documents.docmgt" => "internal"])->count();
        //     $external   = $data   = $this->getExternal(["status"=>$acct_type,"the_documents.docmgt" => "external"])->count();

        //     // needs action
        //     $p1    = $this->getinternal(["internal_docs.status" => null,"the_documents.docmgt" => "internal"])->count();
        //     $p2    = $this->getexternal(["status"=>null,"the_documents.docmgt" => "external"])->count();

        //     // overdue
        //     // $o1   = $this->getinternal(["status" => 1])->count();
        //     // $o2   = $this->getExternal(["status"=>$acct_type])->count();
        //     $o1    = InternalDocs::where('created_at', '<=', Carbon::now()->subDays(5)->toDateTimeString())
        //                                     ->where("status",1)
        //                                     ->get()->count();
        //     $o2    = ExternalDocs::where("created_at","<=", Carbon::now()->subdays(5)->toDateTimeString())
        //                                     ->where("status", 1)
        //                                     ->get()->count();
        // } else {
        //     // $internal   = $this->getinternal(["internal_docs.status" => $acct_type, "to"=>Auth::id(),"the_documents.docmgt" => "internal"])->count();
        //     $internal         = DB::table("internal_docs")
        //                                 ->select("internal_docs.status","the_documents.*","users.name")
        //                                 ->join("foot_prints","internal_docs.documentid","=","foot_prints.documentid")
        //                                 ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
        //                                 ->join("users","internal_docs.from","=","users.id")
        //                                 ->where(["the_documents.docmgt" => "internal",
        //                                              "internal_docs.status" => $acct_type,
        //                                              "foot_prints.status"   => 1,
        //                                              "foot_prints.touserid" => Auth::id()])
        //                                 ->get();
        
        //     $external   = $this->getExternal(["status"=>$acct_type, "routeto" => Auth::id(),"the_documents.docmgt" => "external"])->count();

        //     // needs action
        //     $p1    = $this->getexternal(["status"=>null,"the_documents.docmgt" => "external"])->count();
        //     $p2    = $this->getinternal(["internal_docs.status" => null, "to"=>Auth::id(),"the_documents.docmgt" => "internal"])->count();
            
        //     // overdue
        //     $o1   = $this->getExternal(["status"=>$acct_type,"the_documents.docmgt" => "external"])->count();
        //     $o2   = $this->getExternal(["status"=>$acct_type, "routeto" => Auth::id(),"the_documents.docmgt" => "external"])->count();
        // }

        $internal = $external = $p1 = $p2 = $o1 = $o2 = 0;
    
        return view('dashboard')->with(["internal"=>$internal, "external"=>$external,"needsaction"=>($p1+$p2),"overdue"=>($o1+$o2), "accttype"=>$acct_type,"levelofaccess" => $levelofaccess]);
    }

    function getdocs(Request $req) {
        $status = null;
        
        // $acct_type  = PpersonnelTable::where(["userid"=>Auth::id()])->get("typeofaccount")->toArray()[0];
        // $acct_type  = $acct_type['typeofaccount'];

        $acct_type     = PpersonnelTable::where(["userid"=>Auth::id()])->get();
        $levelofaccess = $acct_type[0]->levelofaccess;
        $acct_type     = $acct_type[0]->offtype->offtype;

        $data          = [];
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
        $documentidname = "document_id";
        switch($req->input("bigbutton")) {
            case "incomming":
                if ($req->input("action") == 1) { // internal 
                    if ($acct_type == 1) { // records unit
                        $data   = $this->getinternal(["internal_docs.status" => 1,
                                                      "the_documents.docmgt" => "internal"]);
                        //dd($data);
                    } else { // non records
                    // echo $acct_type;
                        // $data   = $this->getinternal(["status" => $acct_type, "to"=>Auth::id()]);
                        $data         = DB::table("internal_docs")
                                            ->select("internal_docs.status","the_documents.*","remarks_tables.actionneeded",
                                                      "remarks_tables.remarks","remarks_tables.created_at as retdate","users.name")
                                            ->join("foot_prints","internal_docs.documentid","=","foot_prints.documentid")
                                            ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                                            ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                            ->join("users","internal_docs.from","=","users.id")
                                            ->where(["the_documents.docmgt" => "internal",
                                                     "internal_docs.status" => $acct_type,
                                                     "foot_prints.status"   => 1,
                                                     "foot_prints.touserid" => Auth::id()])
                                            ->orderByDesc("remarkstableid")
                                            ->get();
                    }
                    $documentidname = "documentid";
                }

                if ($req->input("action") == 2) { // external
                    $documentidname = "documentid";

                    if ($acct_type == 1) { // records
                        $data   = $this->getExternal(["the_documents.docmgt" => "external",
                                                        "external_docs.status" => 1]);
                    } else { // non records
                        $data         = DB::table("external_docs")
                                            ->select("external_docs.status","external_docs.sendersname","the_documents.*","remarks_tables.actionneeded",
                                                      "remarks_tables.remarks","remarks_tables.created_at as retdate","users.name")
                                            ->join("foot_prints","external_docs.document_id","=","foot_prints.documentid")
                                            ->join("remarks_tables","external_docs.document_id","=","remarks_tables.documentid")
                                            ->join("the_documents","external_docs.document_id","=","the_documents.documentid")
                                            ->join("users","external_docs.routeto","=","users.id")
                                            ->where(["the_documents.docmgt" => "external",
                                                     "external_docs.status" => $acct_type,
                                                     "foot_prints.touserid" => Auth::id()])
                                            ->get();
                    }
                }

                break;

            case "overdue":
                if ($req->input('action') == 1) {
                    // get internal
                    if ($acct_type == 1) { // logged in account is a member of the records
                        $data         = DB::table("internal_docs")
                                            ->select("internal_docs.status","the_documents.*","remarks_tables.actionneeded",
                                                      "remarks_tables.remarks","remarks_tables.created_at as retdate","users.name")
                                            ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                                            ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                            ->join("users","internal_docs.from","=","users.id")
                                            ->where(["the_documents.docmgt" => "internal",
                                                     "internal_docs.status" => $acct_type])
                                            ->where('the_documents.created_at', '<', Carbon::now()->subDays( $this->maturity )->toDateTimeString())
                                            ->orderByDesc("remarkstableid")
                                            ->get();
                    } else {

                        $data         = DB::table("internal_docs")
                                            ->select("internal_docs.status","the_documents.*","remarks_tables.actionneeded",
                                                      "remarks_tables.remarks","remarks_tables.created_at as retdate","users.name")
                                            ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                                            ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                            ->join("users","internal_docs.from","=","users.id")
                                            ->where(["the_documents.docmgt" => "internal",
                                                     "internal_docs.status" => $acct_type,
                                                     "internal_docs.from" => Auth::id()])
                                            ->where('the_documents.created_at', '<', Carbon::now()->subDays( $this->maturity )->toDateTimeString())
                                            ->orderByDesc("remarkstableid")
                                            ->get();

                        if ($acct_type == 2 || $acct_type == 4 || $acct_type == 3) { // OED and director
                            if ($levelofaccess == 1) {
                                $data   = DB::table("internal_docs")
                                            ->select("internal_docs.status","the_documents.*","users.name")
                                            ->join("foot_prints","internal_docs.documentid","=","foot_prints.documentid")
                                            ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                            ->join("users","internal_docs.from","=","users.id")
                                            ->where(["the_documents.docmgt" => "internal",
                                                     "foot_prints.touserid" => Auth::id()])
                                            ->where("internal_docs.status","!=",7)
                                            ->where('the_documents.created_at', '<', Carbon::now()->subDays( $this->maturity )->toDateTimeString())
                                            ->get();
                            }
                        }

                    }
                    $documentidname = "documentid";
                }

                if ($req->input("action") == 2) {
                    // get external
                    if ($acct_type == 1) { // logged in account is a member of the records
                        $data = ExternalDocs::where("created_at","<", Carbon::now()->subdays( $this->maturity )->toDateTimeString())
                                              ->where("status", $acct_type)
                                              ->get();
                    } else {
                        $data = ExternalDocs::where("created_at","<", Carbon::now()->subdays( $this->maturity )->toDateTimeString())
                                              ->where("status", $acct_type)
                                              ->where("routeto", Auth::id())
                                              ->get();
                    }
                }

                break;

            case "needsaction":
                // get all from internal, external, outgoing

                // :: get internal
                if ( $req->input("action") == 1 ) {
                    if ($acct_type == 1) {
                        // $data    = $this->getinternal(["internal_docs.status" => null,"the_documents.docmgt" => "internal"]);
                        $data = DB::table("internal_docs")
                                    ->select("internal_docs.status","the_documents.*","users.name")
                                    ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                    ->join("users","internal_docs.from","=","users.id")
                                    ->where(["internal_docs.status" => null,"the_documents.docmgt" => "internal", "to" => null])
                                    ->get();
                    } else {
                        $data         = DB::table("internal_docs")
                                            ->select("internal_docs.status","the_documents.*","users.name")
                                            ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                            ->join("users","internal_docs.from","=","users.id")
                                            ->where(["the_documents.docmgt" => "internal",
                                                     "internal_docs.status" => null,
                                                     "internal_docs.from" => Auth::id()])
                                            ->get();                    
                    }
                    $documentidname = "documentid";
                }

                // ::get external
                if ($req->input("action") == 2) {
                    $documentidname = "documentid";
                    if ($acct_type == 1) {
                        $data    = $this->getexternal(["the_documents.docmgt" => "external",
                                                        "external_docs.status" => null]);          
                        // dd($data);            
                    } else {
                        $data = [];
                    }
                }

                break;
            case "inprocess":
                if ( $req->input("action") == 1 ) {
                    if ($acct_type == 1) {
                        // $data    = $this->getinternal(["status"=>7,"the_documents.docmgt" => "external"]);
                        $data       = DB::table("internal_docs")
                                        ->select("internal_docs.status","the_documents.*","users.name")
                                        ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                        ->join("users","internal_docs.from","=","users.id")
                                        ->where("status","!=",7)
                                        ->where("the_documents.docmgt","external")->get();
                    } else {
                        $data       = DB::table("internal_docs")
                                            ->select("internal_docs.status","the_documents.*","users.name","remarks_tables.action",
                                                     "remarks_tables.remarks","remarks_tables.created_at as retdate")
                                            ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                            ->join("users","internal_docs.from","=","users.id")
                                            ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                                            ->where(["the_documents.docmgt" => "internal",
                                                     "internal_docs.from" => Auth::id()])
                                            ->where("internal_docs.status","!=",7)
                                            ->orderByDesc("remarkstableid")
                                            ->get();

                        if ($acct_type == 2 || $acct_type == 3) { // OED
                            if ($levelofaccess == 1) {
                                $data       = DB::table("internal_docs")
                                                ->select("internal_docs.status","the_documents.*","users.name","remarks_tables.action",
                                                        "remarks_tables.remarks","remarks_tables.created_at as retdate")
                                                ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                                ->join("users","internal_docs.from","=","users.id")
                                                ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                                                ->join("foot_prints","internal_docs.documentid","=","foot_prints.documentid")
                                                ->where(["the_documents.docmgt" => "internal",
                                                        "foot_prints.fromuserid" => Auth::id()])
                                                ->where("internal_docs.status","!=",7)
                                                ->orderByDesc("remarkstableid")
                                                ->get();
                            }
                        }

                    }
                    $documentidname = "documentid";
                }

                if ($req->input("action") == 2) { // external
                    $documentidname = "documentid";
                    // $data = [];

                    if ($acct_type == 1) { // records

                    } else {
                        if ($acct_type == 2 && $levelofaccess == 1) { // OED
                            $data       = DB::table("external_docs")
                                            ->select("external_docs.status","the_documents.*","external_docs.sendersname","remarks_tables.action",
                                                     "remarks_tables.remarks","remarks_tables.created_at as retdate")
                                            ->join("the_documents","external_docs.document_id","=","the_documents.documentid")
                                            ->join("remarks_tables","external_docs.document_id","=","remarks_tables.documentid")
                                            ->join("foot_prints","external_docs.document_id","=","foot_prints.documentid")
                                            ->where(["the_documents.docmgt" => "external",
                                                     "foot_prints.fromuserid" => Auth::id()])
                                            ->where("external_docs.status","!=",7)
                                            ->orderByDesc("remarkstableid")
                                            ->get();
                        }

                    }
                }

                break;
        }

        return view("widgets.documentslist")->with(["data"=>$data,
                                                    "doctype"=>$req->input("action"),
                                                    "documentidname"=>$documentidname,
                                                    "requesttype"=>$req->input("bigbutton")])->render();
    }

    function getinternal($action) {
        // return InternalDocs::where($action)->get();
        return DB::table("internal_docs")
                    ->select("internal_docs.status","the_documents.*","users.name","remarks_tables.action",
                             "remarks_tables.remarks","remarks_tables.created_at as retdate")
                    ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                    ->join("users","internal_docs.from","=","users.id")
                    ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                    ->where($action)
                    ->orderByDesc("remarkstableid")
                    ->get();
    }

    function getexternal($action) {
        return DB::table("external_docs")
                    ->select("external_docs.status","the_documents.*","external_docs.sendersname")
                    ->join("the_documents","external_docs.document_id","=","the_documents.documentid")
                    ->where($action)->get();
    }

    function getconfidential($action) {
        
    }

    function forwarddocs(Request $req) {
        return view("widgets.forwardwidget");
    }

    function postforward(Request $req) {
        $values       = (Array) json_decode($req->input("vals"));
        
        // add timezone here

        // $offices      = $values['offices'];
        list($officeid, $offtype)   = explode("_",$values['offices']);
        $officename   = $values['officename'];
        $emps         = $values['emps'];
        // $about        = $values['about'];
        $actions      = $values['actions'];
        $documentid   = $values['documentid'];
        
        $nameofsender = User::where("id",Auth::id())->get("name");

        // update first the status within internal, external, outgoing tables whichever the document falls
        $documentDets = TheDocument::where("documentid",$documentid)->get(["docmgt","barcodenumber", "subject"]);
        $about        = $documentDets[0]->subject;
        /*
            1 = routed to records
            2 = routed to OED
            3 = routed to OC
            4 = routed to office
            5 = routed to division
            6 = routed to employee
        */
        
        switch ($documentDets[0]->docmgt) {
            case "internal":
                $update  = ["to"=> $emps[0], "status"=>$offtype];
                $run     = InternalDocs::where("documentid",$documentid)->update($update);
                break;
            case "external":
                $update  = ["routeto" => $emps[0], "status"=>$offtype];
                $run     = ExternalDocs::where("document_id", $documentid)->update($update);
                break;
            case "outgoing":
                $update  = ["status"=>$offtype];
                $run     = OutgoingDocs::where("document_id", $documentid)->update($update);
                break;
        }

        $barcode    = $documentDets[0]->barcodenumber;

        foreach($emps as $e) {
            if ($e != null) {
                $user               = User::where("id",$e)->get(["name","email"]);
                
                $name               = $user[0]->name;
                $email              = $user[0]->email;

                // remarks 
                $remarkstable                = new RemarksTable();
                $remarkstable->documentid    = $documentid;
                $remarkstable->remarkerid    = Auth::id();
                $remarkstable->toid          = $officeid;
                $remarkstable->thedate       = date("Y-m-d");
                $remarkstable->thetime       = date("H:i");
                $remarkstable->actionneeded  = implode("<br/>",$actions);
                $remarkstable->action        = $nameofsender[0]->name." forwarded this document to {$name}";
                $remarkstable->remarks       = $about;
                $remarkstable->status        = 7;
                $remarkstable->save();

                // footprint
                $FootPrint                  = new FootPrint();
                $FootPrint->typeofdocument  = $documentDets[0]->docmgt;   	
                $FootPrint->documentid      = $documentid; 	
                $FootPrint->touserid 	    = $e;
                $FootPrint->fromuserid      = Auth::id();
                $FootPrint->status          = 1;
                $fp                         = $FootPrint->save();

                // if save:: send to email
                    if ($fp) {
                        $email_rec  = [
                            "name"  => $name,
                            "title" => $about,
                            "bid"   => $barcode,
                            "url"   => url("dashboard")
                        ];

                        $email_dets = [
                            "toemail"      => $email,
                            "about"        => $about,
                            "barcode"      => $barcode,
                            "url"          => "hello.com",
                            "name"         => $name,
                            "body"         => view("templates.route")->with(["data"=>$email_rec])->render()
                        ];

                        // send email
                            Mail::raw('This email confirms that everything was set up correctly!', function ($message) use ($email_dets) { 
                                $message->to($email_dets['toemail'])
                                        ->from("no-reply@minda.gov.ph",$email_dets['name'])
                                        ->subject($email_dets['about']." has been routed to you with a tracking number of ".$email_dets['barcode'])
                                        ->html($email_dets['body']);
                            }); 
                    }
                // end sending to email
            }
        }

        return response()->json("true");
        // return view("widgets.forwardwidget");
    }

    function display_data(Request $req) {
        $isrecord = false;
        
        // $acct_type  = PpersonnelTable::where(["userid"=>Auth::id()])->get("typeofaccount")->toArray()[0];
        // $acct_type  = $acct_type['typeofaccount'];

        $acct_type     = PpersonnelTable::where(["userid"=>Auth::id()])->get();
        $levelofaccess = $acct_type[0]->levelofaccess;
        $acct_type     = $acct_type[0]->offtype->offtype;

        // if ($acct_type == 1) {
        //     $isrecord = true;
        // }

        return view("widgets.displaydoc")->with("acct_type",$levelofaccess);
    }

    function docdetails(Request $req) {
        $docid       = $req->input("docid");
        $document    = TheDocument::where("documentid", $docid)->get();

        $docmgt      = $document[0]->docmgt;
        $details     = null;

        $office      = null;
        $division    = "";
        $owner       = null;
        
        // $docid       = 119;
        $remarks     = RemarksTable::where("documentid", $docid)->get();
        // echo $remarks[1]['action'];
        $attachments = FileController::where("documentid", $docid)->get();

        switch($docmgt) {
            case "internal":
                $details = InternalDocs::where("documentid", $docid)->get();

                $owner      = $details[0]->getuser_from->name;

                if ($details[0]->office != 0) {
                    // $office = $details[0]->getDiv->divisionname;
                    $division = $details[0]->getOff->officename;
                }

                if ($details[0]->division != 0) {
                    // $division = $details[0]->getOff->officename;
                    $office = $details[0]->getDiv->divisionname;
                }

                break;
            case "external":
                $details  = ExternalDocs::where("document_id", $docid)->get();

                $owner    = $details[0]->sendersname;

                $office   = $details[0]->agencyfrom;
                $division = $details[0]->sendersname;

                break;
            case "outgoing":
                $details  = OutgoingDocs::where("document_id", $docid)->get();

                $owner    = $details[0]->towhom." - ".$details[0]->toemailaddr;
                $office   = $details[0]->towhom;
                $division = $details[0]->toemailaddr;
                break;
        }

        // if ($remarks->count() == 0) {
        if ( $remarks->count() == 0 ) { //$remarks->count() == 0  count($remarks) == 0
            $remarks = false;
        } else {
            //$remarks = $remarks[0];
        }

        return view("widgets.documentdetails")->with(["document" =>$document, 
                                                      "details"  => $details, 
                                                      "remarks"  => $remarks,
                                                      "office"   => $office,
                                                      "division" => $division,
                                                      "owner"    => $owner,
                                                      "files"    => $attachments]);
    }

    function getattachments(Request $req) {
        $attachments = FileController::where("documentid", $req->input("docid"))->get();
    }

    function dochistory(Request $req) {
        $docid      = $req->input("docid");

        $details    = RemarksTable::where("documentid",$docid)->orderBy("thedate","ASC")->get();

        return view("widgets.documenthistory")->with(['historydetails'=>$details]);
    }

    function docforward() {
        $thedivision  = TheDivision::all();
        $office       = TheOffice::all();
        
        $acct_type    = PpersonnelTable::where(["userid"=>Auth::id()])->get(); //;
        $acct_type    = $acct_type[0]->offtype->offtype;
        
        /*
            1 = routed to records
            2 = routed to OED
            3 = routed to OC
            4 = routed to office
            5 = routed to division
            6 = routed to employee
        */

        return view("widgets.forwardwidget")->with(["thedivision" => $thedivision, "office" => $office, "acct_type" => $acct_type]);
    }

    function getpersonnel(Request $req) {
        $personnel = PpersonnelTable::where("divisionid",$req->input("divid"))->get();
        $getwhat   = "division";

        if (count($personnel) == 0) {
            $personnel = PpersonnelTable::where("officeid",$req->input("divid"))->get();
            $getwhat   = "office";
        }

        $a         = "";

        foreach($personnel as $p) {
            // $a     .= "<option> {$p->getdivs->divisionname} </option>";
            switch($getwhat) {
                case "division":
                    if ($p->divisionid != 0) {
                        $a     .= "<option value='{$p->getUsers->id}'> {$p->getUsers->name} </option>";
                    }
                    break;
                case "office":
                    if ($p->divisionid == 0) {
                        $a     .= "<option value='{$p->getUsers->id}'> {$p->getUsers->name} </option>";
                    }
                    break;
            }
            
        }

        return $a;
    }

    function completeroute(Request $req) {
        $docid = $req->input("docid");

        // use App\Models\TheDocument;
        // use App\Models\InternalDocs;
        // use App\Models\ExternalDocs;
        // use App\Models\OutgoingDocs;

        $document = TheDocument::where("documentid",$docid)->get();

        $save     = false;
        switch($document[0]->docmgt) {
            case "internal":
                $save = InternalDocs::where("documentid",$docid)->update(["status"=>7]);
                break;
            case "external":
                $save = ExternalDocs::where("document_id", $docid)->update(["status"=>7]);
                break;
            case "outgoing":
                $save = OutgoingDocs::where("document_id",$docid)->update(["status"=>7]);
                break;
        }

        return response()->json($save);
    }

    function completed() {
        return view("windows.completed")->with(["websitename"=>"Completed Documents"]);
    }

    function alldocuments() {
        return view("windows.completed")->with(["websitename"=>"All Documents"]);
    }

    function alldocs(Request $req) {
       $action         = $req->input("action");

        $acct_type     = PpersonnelTable::where(["userid"=>Auth::id()])->get();
        $levelofaccess = $acct_type[0]->levelofaccess;
        $acct_type     = $acct_type[0]->offtype->offtype;


        $data           = [];
        $documentidname = null;
        switch($action) {
            case "internal":
                $documentidname = "documentid";
                if ($acct_type == 1) {
                    echo "hello";
                    // $data   = $this->getinternal(["the_documents.docmgt" => "internal"]);
                    $data         = DB::table("internal_docs")
                                        ->select("internal_docs.status","the_documents.*","remarks_tables.actionneeded",
                                                "remarks_tables.remarks","remarks_tables.created_at as retdate","users.name")
                                        ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                                        ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                        ->join("users","internal_docs.from","=","users.id")
                                        ->where(["the_documents.docmgt" => "internal"])
                                        ->orderByDesc("remarkstableid")
                                        ->get();
                } else {
                    $data   = [];
                    // $data         = DB::table("internal_docs")
                    //                     ->select("internal_docs.status","the_documents.*","remarks_tables.actionneeded",
                    //                             "remarks_tables.remarks","remarks_tables.created_at as retdate","users.name")
                    //                     ->join("foot_prints","internal_docs.documentid","=","foot_prints.documentid")
                    //                     ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                    //                     ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                    //                     ->join("users","internal_docs.from","=","users.id")
                    //                     ->where(["the_documents.docmgt" => "internal",
                    //                             "internal_docs.status" => 7,
                    //                             "foot_prints.touserid" => Auth::id()])
                    //                     ->orderByDesc("remarkstableid")
                    //                     ->get();
                }
                break;
            case "external":
                $documentidname = "documentid";
                if ($acct_type == 1) {
                    $data   = $this->getExternal(["the_documents.docmgt" => "external"]);
                } else {
                    $data   = [];
                    // $data         = DB::table("external_docs")
                    //                     ->select("external_docs.status","external_docs.sendersname","the_documents.*","remarks_tables.actionneeded",
                    //                             "remarks_tables.remarks","remarks_tables.created_at as retdate")
                    //                     ->join("foot_prints","external_docs.document_id","=","foot_prints.documentid")
                    //                     ->join("remarks_tables","external_docs.document_id","=","remarks_tables.documentid")
                    //                     ->join("the_documents","external_docs.document_id","=","the_documents.documentid")
                    //                     ->where(["the_documents.docmgt" => "external",
                    //                             "external_docs.status" => 7,
                    //                             "foot_prints.touserid" => Auth::id()])
                    //                     ->get();
                }
                break;
        }

        return view("widgets.documentslist")->with(["data"           => $data,
                                                    "doctype"        => $req->input("action"),
                                                    "documentidname" => $documentidname,
                                                    "requesttype"    => $req->input("action")])->render();
    }

    function donedocs(Request $req) {
        $action         = $req->input("action");

        $acct_type     = PpersonnelTable::where(["userid"=>Auth::id()])->get();
        $levelofaccess = $acct_type[0]->levelofaccess;
        $acct_type     = $acct_type[0]->offtype->offtype;


        $data           = [];
        $documentidname = null;
        switch($action) {
            case "internal":
                $documentidname = "documentid";
                if ($acct_type == 1) {
                    $data   = $this->getinternal(["internal_docs.status" => 7,
                                                  "the_documents.docmgt" => "internal"]);
                } else {
                    $data         = DB::table("internal_docs")
                                        ->select("internal_docs.status","the_documents.*","remarks_tables.actionneeded",
                                                "remarks_tables.remarks","remarks_tables.created_at as retdate","users.name")
                                        ->join("foot_prints","internal_docs.documentid","=","foot_prints.documentid")
                                        ->join("remarks_tables","internal_docs.documentid","=","remarks_tables.documentid")
                                        ->join("the_documents","internal_docs.documentid","=","the_documents.documentid")
                                        ->join("users","internal_docs.from","=","users.id")
                                        ->where(["the_documents.docmgt" => "internal",
                                                "internal_docs.status" => 7,
                                                "foot_prints.touserid" => Auth::id()])
                                        ->orderByDesc("remarkstableid")
                                        ->get();
                }
                break;
            case "external":
                $documentidname = "document_id";
                if ($acct_type == 1) {
                    $data   = $this->getExternal(["the_documents.docmgt" => "external",
                                                        "external_docs.status" => 7]);
                } else {
                    $data         = DB::table("external_docs")
                                        ->select("external_docs.status","external_docs.sendersname","the_documents.*","remarks_tables.actionneeded",
                                                "remarks_tables.remarks","remarks_tables.created_at as retdate")
                                        ->join("foot_prints","external_docs.document_id","=","foot_prints.documentid")
                                        ->join("remarks_tables","external_docs.document_id","=","remarks_tables.documentid")
                                        ->join("the_documents","external_docs.document_id","=","the_documents.documentid")
                                        ->where(["the_documents.docmgt" => "external",
                                                "external_docs.status" => 7,
                                                "foot_prints.touserid" => Auth::id()])
                                        ->get();
                }
                break;
        }

        return view("widgets.documentslist")->with(["data"           => $data,
                                                    "doctype"        => $req->input("action"),
                                                    "documentidname" => $documentidname,
                                                    "requesttype"    => $req->input("action")])->render();
    }

    function provideupdate(Request $req) {
        $update             = $req->input("update");
        $docid              = $req->input("docid");
        $complete           = $req->input("complete");

        $latest             = RemarksTable::where("documentid",$docid)->latest("remarkstableid")->get();
        $userdets           = User::where("id",Auth::id())->get(["name","email"]);
        $name               = $userdets[0]->name;
        $email              = $userdets[0]->email;

        $documentdets       = TheDocument::where("documentid",$docid)->get(["docmgt","subject","barcodenumber"]);
        $docmgt             = $documentdets[0]->docmgt;

        $rt                 = new RemarksTable();
        $rt->documentid     = $docid;
        $rt->remarkerid     = Auth::id();
        $rt->toid           = $latest[0]->toid;
        $rt->thedate        = date("Y-m-d");
        $rt->thetime        = date("H:i:s");
        $rt->actionneeded   = "";
        $rt->action         = "{$name} provided an update";
        $rt->remarks        = $update;
        $rt->status         = 0; // ($complete == true)?7:1;

        $approved    = false;

        if ($complete == true || $complete == "true" || $complete == 1 || $complete == "1") {
            // $save        = RemarksTable::where(["documentid" => $docid, "remarkerid" => Auth::id()])->update(["status" => 7]);
            $rt->status     = 7;

            $checkstatus = RemarksTable::where(["documentid" => $docid])->get("status");

            foreach($checkstatus as $cs) {
                if ($cs->status == 7) {
                    $approved = true;
                } else {
                    $approved = false;
                    break;
                }
            }
        }

        $save               = $rt->save();

        if ($save) {
            $fp_update      = ["status" => 0];
            $fp_where       = ["documentid"=>$docid, "touserid" => Auth::id()];

            /*
                use App\Models\InternalDocs;
                use App\Models\ExternalDocs;
                use App\Models\OutgoingDocs;
            */
            if ($approved) {
                switch($docmgt) {
                    case "internal":
                        $save = InternalDocs::where("documentid",$docid)->update(["status" => 7]);
                        break;
                    case "external":
                        $save = ExternalDocs::where("document_id", $docid)->update(["status" => 7]);
                        break;
                    case "outgoing":
                        $save = OutgoingDocs::where("document_id", $docid)->update(["status" => 7]);
                        break;
                }
            }

            // get footprint details
                $save                 = FootPrint::where($fp_where)->update($fp_update);
            // end 

            // send email
                        // $email_rec  = [
                        //         "name"   => $name,
                        //         "title"  => $documentdets[0]->subject,
                        //         "bid"    => $documentdets[0]->barcodenumber,
                        //         "url"    => url("dashboard"),
                        //         "update" => $update
                        //     ];

                        // $email_dets = [
                        //         "toemail"      => $email,
                        //         "about"        => $update,
                        //         "title"        => $documentdets[0]->subject,
                        //         "barcode"      => $documentdets[0]->barcodenumber,
                        //         "url"          => url("dashboard"),
                        //         "name"         => $name,
                        //         "body"         => view("templates.update")->with(["data"=>$email_rec])->render()
                        //     ];

                        //     Mail::raw('This email confirms that everything was set up correctly!', function ($message) use ($email_dets) { 
                        //         $message->to($email_dets['toemail'])
                        //                 ->from("no-reply@minda.gov.ph",$email_dets['name'])
                        //                 ->subject($email_dets['name']." has provide an update to ".$email_dets['title'])
                        //                 ->html($email_dets['body']);
                        //     }); 
            // end sending email
        }

        return response()->json($save);
    }
}
