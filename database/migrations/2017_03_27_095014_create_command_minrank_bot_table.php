<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandMinrankBotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('command_minrank_bot', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('command_id')->unsigned()->index();
            $table->foreign('command_id')->references('id')->on('commands');
            $table->integer('minrank_id')->unsigned()->index();
            $table->foreign('minrank_id')->references('id')->on('minranks');
            $table->integer('bot_id')->unsigned()->index();
            $table->foreign('bot_id')->references('id')->on('bots');
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
        Schema::drop('command_minrank_bot');
    }
}
