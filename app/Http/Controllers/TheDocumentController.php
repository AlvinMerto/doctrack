<?php

namespace App\Http\Controllers;

use App\Models\TheDocument;
use App\Models\InternalDocs;

use Auth;
use Illuminate\Http\Request;

class TheDocumentController extends Controller
{
    //
    function dashboard() {

        // $a = InternalDocs::where(["to"=>Auth::id(),"status"=>1])->get();

        // foreach($a as $aa) {
        //     echo $aa->getdocs->subject;
        // }

        return view('dashboard');
    }

    function getdocs(Request $req) {
        switch($req->input("bigbutton")) {
            case "needsaction":
                $data = $this->getinternal($req->input("action"));
                return view("widgets.documentslist")->with("data", $data)->render();
                break;
            case "overdue":
                
                break;
            case "confi":

                break;            
        }
    }

    function getinternal($action) {
        return InternalDocs::where(["to"=>Auth::id(),"status"=>$action])->get();
    }

    function forwarddocs() {
        return view("widgets.forwardwidget");
    }

    function display_data() {
        return view("widgets.displaydoc");
    }

    function docdetails() {
        return view("widgets.documentdetails");
    }

    function dochistory() {
        return view("widgets.documenthistory");
    }
}
