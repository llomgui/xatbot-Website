<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomcommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customcommands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bot_id')->index();
            $table->string('command');
            $table->string('response');
            $table->integer('minrank_id')->index();
            $table->timestamps();
            $table->foreign('bot_id')->references('id')->on('bots');
            $table->foreign('minrank_id')->references('id')->on('minranks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customcommands');
    }
}
