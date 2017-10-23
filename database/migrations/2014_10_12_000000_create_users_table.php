<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use ShiftOneLabs\LaravelNomad\Extension\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->passthru('citext', 'name')->unique();
            $table->string('email')->unique();
            $table->passthru('citext', 'regname')->unique();
            $table->bigInteger('xatid')->unique();
            $table->string('password');
            $table->integer('language_id')->unsigned()->index();
            $table->ipAddress('ip');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
