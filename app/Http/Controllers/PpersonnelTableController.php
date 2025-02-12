<?php

namespace App\Http\Controllers;

use App\Models\PpersonnelTable;
use App\Models\TheDivision;
use App\Models\TheOffice;

use Illuminate\Http\Request;

class PpersonnelTableController extends Controller
{
    function manageUser() {
        $collection = PpersonnelTable::all();

        return view("windows.manageuser")->with(["collection" => $collection]);
    }

    function manageuserwidget(Request $req) {
        $userid     = $req->input("userid");

        $collection = PpersonnelTable::where("userid",$userid)->get();
        $divs       = TheDivision::all();
        $offs       = TheOffice::all();

        return view("widgets.manageuserwidget")->with(["collection" => $collection, "divs" => $divs, "offs" => $offs])->render();
    }

    function savemanagement(Request $req) {
        $divisionid     = $req->input("divisionid");
        $officeid       = $req->input("officeid");
        $role           = $req->input("role");
        $uid            = $req->input("uid");
        $typeofaccount  = $req->input("typeofaccount");

        $update     = PpersonnelTable::update(["officeid"      => $officeid, 
                                               "divisionid"    => $divisionid, 
                                               "typeofaccount" => $typeofaccount , 
                                               "levelofaccess" => $role])->where("userid", $uid);

        return response()->json($update);                
    }
}
