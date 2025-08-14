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
        Schema::table('dataSchool', function (Blueprint $table) {
            $table->unsignedBigInteger('process_id')->nullable(); // Columna para la referencia
            $table->foreign('process_id')->references('id')->on('processes')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_school', function (Blueprint $table) {
            $table->dropColumn("processs_id");
        });
    }
};