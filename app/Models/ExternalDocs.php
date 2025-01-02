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

class ExternalDocs extends Model
{
    //
    protected $table    = "external_docs";
    protected $id       = "externalid";    
    protected $fillable = [
        "agencyfrom","sendersname","sendersemail","numberofcopy","numberofpages","routeto","document_id","status","created_at","updated_at"
    ];

    function get_routeto_user() {
        return $this->hasOne(User::class,"id","routeto");
    }

    function getdocs() {
        return $this->hasOne(TheDocument::class, 'documentid', 'document_id');
    }

    function getDiv() {
        return $this->hasOne(TheDivision::class,"divisionid","division");
    }

    function getOff() {
        return $this->hasOne(TheOffice::class,"officeid","office");
    }

    function getuser_to() {
        return $this->hasOne(User::class,"id","to");
    }

    function getuser_from() {
        return $this->hasOne(User::class,"id","from");
    }

    function get_remarks() {
        return $this->hasOne(RemarksTable::class,"documentid","document_id");
    }

    function get_files() {
        return $this->hasOne(FileController::class,"documentid","documentid");
    }
}

