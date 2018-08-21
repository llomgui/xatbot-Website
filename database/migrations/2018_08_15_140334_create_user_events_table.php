<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('xatid');
            $table->integer('rank');
            $table->integer('chatid');
            $table->string('chatname');
            $table->integer('amount_bans');
            $table->integer('amount_commands');
            $table->integer('amount_kicks');
            $table->integer('amount_messages');
            $table->integer('amount_ranks');
            $table->timestamp('connected_at');
            $table->timestamp('left_at');
            $table->timestamps();
            $table->index(['xatid', 'chatid', 'left_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_events');
    }
}
