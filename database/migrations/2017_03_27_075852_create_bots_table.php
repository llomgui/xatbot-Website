<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bot_status_id')->nullable()->index();
            $table->integer('server_id')->nullable()->index();
            $table->bigInteger('premium')->default(1);
            $table->bigInteger('chatid')->unique();
            $table->string('chatname')->unique();
            $table->integer('chatpw')->nullable();
            $table->string('nickname')->default('OceanProject(glow#000080#c0ccd4)(hat#Eb)');
            $table->string('avatar')->default('123');
            $table->string('homepage')->default('OceanProject.fr');
            $table->string('status')->default('OceanProject.fr#000080#c0ccd4');
            $table->string('pcback')->nullable();
            $table->string('autowelcome')->nullable();
            $table->string('ticklemessage')->nullable();
            $table->integer('maxkick')->default('3');
            $table->integer('maxkickban')->default('1');
            $table->integer('maxflood')->default('10');
            $table->integer('maxchar')->default('10');
            $table->integer('maxsmilies')->default('10');
            $table->string('automessage')->nullable();
            $table->integer('automessagetime')->nullable();
            $table->boolean('autorestart')->default('0');
            $table->integer('creator_user_id')->index();
            $table->timestamps();
            $table->foreign('bot_status_id')->references('id')->on('bot_statuses');
            $table->foreign('creator_user_id')->references('id')->on('users');
            $table->foreign('server_id')->references('id')->on('servers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bots');
    }
}
