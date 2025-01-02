<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('the_documents', function (Blueprint $table) {
            $table->increments("documentid");
            $table->datetime("datetoday");
            $table->string("briefernumber");
            $table->string("barcodenumber");
            $table->string("documentcat");
            $table->enum("docmgt",["internal","external","outgoing"]);
            $table->string("subject");
            $table->enum("priority",["confidential","high","moderate","low"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_documents');
    }
};
