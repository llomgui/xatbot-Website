<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint;

class CreateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('xatid')->index();
            $table->passthru('citext', 'regname')->index();
            $table->integer('chatid');
            $table->passthru('citext', 'chatname');
            $table->jsonb('packet');
            $table->boolean('optout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userinfo');
    }
}
