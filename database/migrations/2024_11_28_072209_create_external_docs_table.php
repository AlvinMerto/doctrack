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
        Schema::create('external_docs', function (Blueprint $table) {
            $table->increments("externalid");
            $table->string("agencyfrom");
            $table->string("sendersname");
            $table->string("sendersemail");
            $table->integer("numberofcopy");
            $table->integer("numberofpages");
            $table->integer("routeto");
            $table->integer("document_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_docs');
    }
};
