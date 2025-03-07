<?php

namespace App\Http\Controllers;

use App\Models\PpersonnelTable;
use App\Models\TheDivision;
use App\Models\TheOffice;
use App\Models\User;

use Illuminate\Http\Request;

class PpersonnelTableController extends Controller
{
    function manageUser() {
        $collection = PpersonnelTable::all();
        $users      = User::all();

        return view("windows.manageuser")->with(["collection" => $collection,"users" => $users]);
    }

    function manageuserwidget(Request $req) {
        $userid     = $req->input("userid");

        $collection = PpersonnelTable::where("userid",$userid)->get();
        $users      = User::all();
        $divs       = TheDivision::all();
        $offs       = TheOffice::all();

        return view("widgets.manageuserwidget")->with(["collection" => $collection, "divs" => $divs, "offs" => $offs, "users" => $users])->render();
    }

    function savemanagement(Request $req) {
        $divisionid     = $req->input("divisionid");
        $officeid       = $req->input("officeid");
        $role           = $req->input("role");
        $uid            = $req->input("uid");
        $typeofaccount  = $req->input("typeofaccount");

        // $update     = PpersonnelTable::update(["officeid"      => $officeid, 
        //                                        "divisionid"    => $divisionid, 
        //                                        "typeofaccount" => $typeofaccount , 
        //                                        "levelofaccess" => $role])->where("userid", $uid);

        $update        = PpersonnelTable::updateOrCreate(["userid"        => $uid], 
                                                         ["officeid"      => $officeid, 
                                                          "divisionid"    => $divisionid, 
                                                          "typeofaccount" => $typeofaccount, 
                                                          "levelofaccess" => $role,
                                                          "status"        => 1]);
                        // ->where("userid", $uid)

        return response()->json($update);                
    }
}
