<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheDivision extends Model
{
    //
    protected $table = "the_divisions";
    protected $id    = "divisionid";
    protected $fillable = [
        "divisionname","created_at","updated_at"
    ];
}
