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
        Schema::create('outgoing_docs', function (Blueprint $table) {
            $table->increments("outgoingid");
            $table->integer("officefrom");
            $table->integer("fromwhom");
            $table->integer("toaddress");
            $table->string("toemailaddr");
            $table->string("modeofrelease");
            $table->integer("document_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outgoing_docs');
    }
};
