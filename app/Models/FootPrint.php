<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\TheDocument;
use App\Models\TheOffice;
use App\Models\TheDivision;
use App\Models\User;
use App\Models\RemarksTable;
use App\Models\FileController;
use App\Models\ExternalDocs;
use App\Models\InternalDocs;

class FootPrint extends Model
{
    //
    protected $table        = "foot_prints";
    protected $id           = "footprintid";
    protected $fillable     = [
        "typeofdocument","documentid","touserid","fromuserid","status","created_at","updated_at"
    ];

    function getdocs() {
        return $this->belongsTo(TheDocument::class,"documentid","documentid");
    }

    function getExternal() {
        return $this->hasOne(ExternalDocs::class,"document_id","documentid");
    }

    function getInternal() {
        return $this->belongsTo(InternalDocs::class,"documentid","documentid");
    }

    function getDiv() {
        return $this->hasOne(TheDivision::class,"divisionid","division");
    }

    function getOff() {
        return $this->hasOne(TheOffice::class,"officeid","office");
    }

    function getuser_to() {
        return $this->hasOne(User::class,"id","touserid");
    }

    function getuser_from() {
        return $this->hasOne(User::class,"id","fromuserid");
    }

    function get_remarks() {
        return $this->hasOne(RemarksTable::class,"documentid","documentid");
    }

    function get_files() {
        return $this->hasOne(FileController::class,"documentid","documentid");
    }
}
