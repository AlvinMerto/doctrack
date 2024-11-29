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
        Schema::create('internal_docs', function (Blueprint $table) {
            $table->increments("internalid");
            $table->integer("office");
            $table->integer("division");
            $table->integer("from");
            $table->integer("to")->nullable();
            $table->string("actionneeded")->nullable();
            $table->integer("documentid");
            $table->integer("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_docs');
    }
};
