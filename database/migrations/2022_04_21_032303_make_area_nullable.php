<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeAreaNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('raawa_user', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('raawa_user', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id')->nullable(false)->change();
        });
    }
}
