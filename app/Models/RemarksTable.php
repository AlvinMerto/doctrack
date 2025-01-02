<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RemarksTable extends Model
{
    //
    protected $table            = "remarks_tables";
    protected $id               = "remarkstableid";
    protected $fillable         = [
        "documentid","remarkerid","toid","thedate","thetime","actionneeded","action","remarks","status","created_at","updated_at"
    ];

    function getUser() {
        return $this->hasOne(User::class,"id","remarkerid");
    }
}
