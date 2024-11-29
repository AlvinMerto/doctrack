<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\TheDocument;
use App\Models\InternalDocs;

class EntrycontrolController extends Controller
{
    //
    function entry() {
        return view("windows.entry");
    }

    function postentry(Request $req) {
        $thedocument                 = new TheDocument();

        // the document
        $thedocument->datetoday      = $req->input("datetoday");
        $thedocument->briefernumber  = $req->input("briefer-number");
        $thedocument->barcodenumber  = $req->input("barcode-number");
        $thedocument->documentcat    = $req->input("doccattype");
        $thedocument->subject        = $req->input("about");
        $thedocument->priority       = $req->input("priority_lvl");
        // $thedocument->updated_at     = date();
        // $thedocument->created_at     = date();
        $thedocument->save();

        // get the newly inserted ID
        $documentid = $thedocument->id;

        // type of document
        $typeofdoc      = $req->input("typeofdoc");

        if ($typeofdoc == "internal") {
            $internal_docs               = new InternalDocs();
            $internal_docs->office       = $req->input("officeid");
            $internal_docs->division     = $req->input("divisionid");
            $internal_docs->from         = 1; // $req->input("documentowner");
            $internal_docs->to           = null;
            $internal_docs->actionneeded = null;
            $internal_docs->status       = null;
            $internal_docs->documentid   = $documentid;
            $internal_docs->save();
        }
    }

}
