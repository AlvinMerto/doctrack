<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheOffice extends Model
{
    //
    protected $table    = "the_offices";
    protected $id       = "officeid";
    protected $fillable = [
        "officename","created_at","updated_at"
    ];

}
