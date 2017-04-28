<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotlangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('botlang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('botlang_sentences_id')->index();
            $table->integer('bot_id')->index();
            $table->string('value')->nullable();
            $table->timestamps();
            $table->foreign('botlang_sentences_id')->references('id')->on('botlang_sentences');
            $table->foreign('bot_id')->references('id')->on('bots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('botlang');
    }
}
