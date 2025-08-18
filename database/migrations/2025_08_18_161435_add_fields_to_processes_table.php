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
        Schema::table('processes', function (Blueprint $table) {
            $table->string("image_titulation_url")->nullable();
            $table->string("image_donation_url")->nullable();
            $table->string("image_tittle_url")->nullable();
            $table->string("image_coments")->nullable();
            $table->string("donation_coments")->nullable();
            $table->string("tittle_coments")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('processes', function (Blueprint $table) {
            //
        });
    }
};
