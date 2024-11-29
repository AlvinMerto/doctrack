<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheDocument extends Model
{
    //
    protected $table    = "the_documents";
    protected $id       = "documentid";
    protected $fillable = [
        "datetoday","briefernumber","barcodenumber","documentcat","subject","priority","updated_at","created_at"
    ];
}
