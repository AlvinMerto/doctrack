<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bookmarks;

use DB;
use Auth;

class BookmarksController extends Controller
{
    //

    function bookmarkthis(Request $req) {
        $documentid = $req->input("docid");
        $userid     = Auth::id();

        $save = DB::table("bookmarks")->insertOrIgnore(['bid' => $documentid,"documentid"=>$documentid, "userid" => $userid]);

        return response()->json($save);
    }

    function getbookmarks(Request $req) {
        $userid     = Auth::id();

        $collection = Bookmarks::where(["userid" => $userid])->get();

        return view("widgets.bookmarklist")->with(["collection" => $collection])->render();
    }

    function removebookmark(Request $req) {
        $user   = Auth::id();
        $docid  = $req->input("did");

        $delete = Bookmarks::where(["userid" => $user,"documentid" => $docid])->delete();

        return response()->json($delete);
    }
}
