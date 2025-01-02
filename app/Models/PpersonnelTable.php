<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\TheDivision;
use App\Models\TheOffice;
use App\Models\User;

class PpersonnelTable extends Model
{
    //
    protected $table    = "ppersonnel_tables";
    protected $id       = "personnelid";
    protected $fillable = [
        "userid","officeid","divisionid","status","created_at","updated_at"
    ];

    function getdivs() {
        return $this->hasOne(TheDivision::class,"divisionid","divisionid");
    }

    function getUsers() {
        return $this->hasOne(User::class,"id","userid");
    }

    function offtype() {
        return $this->hasOne(TheOffice::class,"officeid","officeid");
    }
}
