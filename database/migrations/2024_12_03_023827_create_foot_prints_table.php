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
        Schema::create('foot_prints', function (Blueprint $table) {
            $table->increments("footprintid");
            $table->enum("typeofdocument",["internal","external","ongoing"]);
            $table->integer("documentid");
            $table->integer("touserid");
            $table->integer("fromuserid");
            $table->integer("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foot_prints');
    }
};
