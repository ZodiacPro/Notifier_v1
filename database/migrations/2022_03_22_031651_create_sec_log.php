<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sec_log', function (Blueprint $table) {
            $table->id();
            $table->date('expired');
            $table->unsignedBigInteger('rawwa_user_id');
            $table->foreign('rawwa_user_id')->references('id')->on('raawa_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sec_log');
    }
}
