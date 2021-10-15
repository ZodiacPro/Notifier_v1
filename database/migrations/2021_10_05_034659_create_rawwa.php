<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawwa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawwa', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('name')->unique();
            $table->string('secID');
            $table->date('expired')->nullable();
            $table->date('online_raawa')->nullable();
            $table->date('online_raawa_expired')->nullable();
            $table->string('team');
            //
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawwa');
    }
}
