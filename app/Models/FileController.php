<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileController extends Model
{
    //
    protected $table    = "file_controllers";
    protected $id       = "fileid";
    protected $fillable = [
        "documentid","thefile","status","created_at","updated_at"
    ];
}
