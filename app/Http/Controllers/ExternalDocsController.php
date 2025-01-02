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

use Illuminate\Http\Request;
use Carbon\Carbon;

class ExternalDocsController extends Controller
{
    function entrytracking() {
         return view("windows.entertracking");
    }

    function tracking(Request $req) {

            $trackingid = $req->input("trackingnumber");

            $docdetails = TheDocument::where("barcodenumber",$trackingid)->get(["documentid","subject","documentcat","datetoday","created_at"])->toArray();
            
            $errormsg   = null;
            if ( count($docdetails) == 0) {
                $errormsg = "File not found!";

                return view("windows.entertracking")->with(["errormsg"=>$errormsg]);
            }

            $details    = RemarksTable::where("documentid",$docdetails[0]['documentid'])->orderBy("thedate","ASC")->get();

            return view("windows.tracking")->with(['historydetails'=>$details,"docdetails"=>$docdetails]);

    }
}
