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
        Schema::create('remarks_tables', function (Blueprint $table) {
            $table->increments("remarkstableid");
            $table->integer("documentid");
            $table->integer("remarkerid"); // the one who did the commenting
            $table->integer("toid")->nullable();
            $table->date("thedate");
            $table->time("thetime");
            $table->string("actionneeded")->nullable();
            $table->text("action")->nullable();
            $table->string('remarks')->nullable();
            $table->integer("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remarks_tables');
    }
};
