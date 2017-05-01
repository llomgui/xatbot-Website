<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function() {
    return 'Hello';
});

Route::group(['prefix' => 'panel'], function () {

    Route::group(['middleware' => 'auth', 'namespace' => 'Page'], function () {

        Route::get('home', 'HomeController@index')->name('panel');
        Route::get('chat', 'ChatController@index')->name('chat');

    });

    Route::group(['prefix' => 'bot', 'middleware' => 'auth', 'namespace' => 'Bot'], function () {

        Route::post('create', 'CreateController@store')->name('bot.create');
        Route::post('editnickname', 'EditController@editNickname')->name('bot.editnickname');
        Route::get('setbotid/{botid}', 'BotController@setBotID')->name('bot.setbotid');
        Route::get('edit', 'EditController@showEditForm')->name('bot.edit');
        Route::post('edit', 'EditController@edit')->name('bot.edit');

        Route::get('staff', 'StaffController@showStaffForm')->name('bot.staff');
        Route::post('createstaff', 'StaffController@createStaff')->name('bot.createstaff');
        Route::post('editstaff', 'StaffController@editStaff')->name('bot.editstaff');
        Route::post('deletestaff', 'StaffController@deleteStaff')->name('bot.deletestaff');

        Route::get('autotemp', 'AutoTempController@showAutoTempForm')->name('bot.autotemp');
        Route::post('createautotemp', 'AutoTempController@createAutoTemp')->name('bot.createautotemp');
        Route::post('editautotemp', 'AutoTempController@editAutoTemp')->name('bot.editautotemp');
        Route::post('deleteautotemp', 'AutoTempController@deleteAutoTemp')->name('bot.deleteautotemp');

        Route::get('snitch', 'SnitchController@showSnitchForm')->name('bot.snitch');
        Route::post('createsnitch', 'SnitchController@createSnitch')->name('bot.createsnitch');
        Route::post('editsnitch', 'SnitchController@editSnitch')->name('bot.editsnitch');
        Route::post('deletesnitch', 'SnitchController@deleteSnitch')->name('bot.deletesnitch');

        Route::get('alias', 'AliasController@showAliasForm')->name('bot.alias');
        Route::post('createalias', 'AliasController@createAlias')->name('bot.createalias');
        Route::post('editalias', 'AliasController@editAlias')->name('bot.editalias');
        Route::post('deletealias', 'AliasController@deleteAlias')->name('bot.deletealias');

        Route::post('actionbot', 'BotController@actionBot')->name('bot.actionbot');

    });

    Route::group(['prefix' => 'support', 'middleware' => 'auth'], function () {
        return 'Support';
    });

    Route::group(['prefix' => 'user', 'namespace' => 'Auth'], function () {

        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login')->name('login');

        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');

        Route::post('password/reset', 'ResetPasswordController@reset');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');

        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register')->name('register');

        Route::get('profile', 'ProfileController@showUpdateForm')->name('profile');
        Route::post('profile', 'ProfileController@update')->name('profile');

    });
});