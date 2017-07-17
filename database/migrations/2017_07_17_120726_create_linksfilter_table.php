<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksfilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linksfilter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bot_id')->index();
            $table->string('link');
            $table->timestamps();
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
        Schema::drop('linksfilter');
    }
}
