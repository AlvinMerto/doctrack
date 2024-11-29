<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\TheDocument;

class InternalDocs extends Model
{
    //
    protected $table    = "internal_docs";
    protected $id       = "internalid";
    protected $fillable = [
        "office","division","from","to","actionneeded","documentid","status","created_at","updated_at"
    ];

    function getdocs() {
        return $this->hasOne(TheDocument::class, 'documentid', 'documentid');
    }
}
