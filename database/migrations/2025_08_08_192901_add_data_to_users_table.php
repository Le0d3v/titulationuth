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
        Schema::table('users', function (Blueprint $table) {
            $table->string("tuition")->nullable();
            $table->date("born_date")->nullable();
            $table->string("telephone")->nullable();
            $table->integer("rol")->nullable();
            $table->string("gener")->nullable();
            $table->string("civil_state")->nullable();
            $table->string("image")->nullable();
            $table->string("rfc")->nullable();
            $table->string("curp")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("born_date");
            $table->dropColumn("telephone");
            $table->dropColumn("rol");
            $table->dropColumn("gener");
            $table->dropColumn("state");
            $table->dropColumn("social_secure");
            $table->dropColumn("address");
            $table->dropColumn("image");
            $table->dropColumn("tuition");
            $table->dropColumn("rfc");
            $table->dropColumn("curp");
        });
    }
};
