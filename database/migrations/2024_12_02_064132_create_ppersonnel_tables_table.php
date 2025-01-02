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
        Schema::create('ppersonnel_tables', function (Blueprint $table) {
            $table->increments("personnelid");
            $table->integer("userid");
            $table->integer("officeid");
            $table->integer("divisionid");
            $table->enum("typeofaccount",["records","Chief","director","oed","oc","normal"]);
            $table->integer("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppersonnel_tables');
    }
};
