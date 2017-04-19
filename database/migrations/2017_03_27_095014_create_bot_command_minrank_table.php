<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotCommandMinrankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bot_command_minrank', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('bot_id')->unsigned()->index();
            $table->foreign('bot_id')->references('id')->on('bots');
            $table->integer('command_id')->unsigned()->index();
            $table->foreign('command_id')->references('id')->on('commands');
            $table->integer('minrank_id')->unsigned()->index();
            $table->foreign('minrank_id')->references('id')->on('minranks');
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
        Schema::drop('bot_command_minrank');
    }
}
