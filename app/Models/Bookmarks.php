<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\TheDocument;
use App\Models\TheOffice;
use App\Models\TheDivision;
use App\Models\User;
use App\Models\RemarksTable;
use App\Models\FileController;
use App\Models\FootPrint;

class Bookmarks extends Model
{
    //

    protected $table      = "bookmarks";
    protected $id         = "bid";
    protected $fillable   = [
        "documentid","userid","created_at","updated_at"
    ];

    function getremarks() {
        return $this->hasOne(RemarksTable::class,"documentid","documentid")->latest();
    }

    function getdetails() {
        return $this->hasOne(TheDocument::class,"documentid","documentid");
    }

    function getuser() {
        return $this->hasOne(User::class,"id","userid");
        // return $this->hasOneThrough(User::class,TheDocument::class,"id","");
    }
}
