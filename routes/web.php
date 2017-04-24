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

	Route::group(['middleware' => 'auth'], function () {

		Route::get('home', 'Page\HomeController@index')->name('panel');
		Route::get('chat', 'Page\ChatController@index')->name('chat');

	});

	Route::group(['prefix' => 'bot', 'middleware' => 'auth'], function () {

		Route::post('create', 'Bot\CreateController@store')->name('bot.create');
		Route::post('editnickname', 'Bot\EditController@editNickname')->name('bot.editnickname');
		Route::get('setbotid/{botid}', 'Bot\BotController@setBotID')->name('bot.setbotid');
		Route::get('edit', 'Bot\EditController@showEditForm')->name('bot.edit');
		Route::post('edit', 'Bot\EditController@edit')->name('bot.edit');

	});

	Route::group(['prefix' => 'support', 'middleware' => 'auth'], function () {
		return 'Support';
	});

	Route::group(['prefix' => 'user'], function () {

		Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
		Route::post('login', 'Auth\LoginController@login')->name('login');

		Route::post('logout', 'Auth\LoginController@logout')->name('logout');

		Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
		Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');

		Route::post('password/reset', 'Auth\ResetPasswordController@reset');
		Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');

		Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('register', 'Auth\RegisterController@register')->name('register');

		Route::get('profile', 'Auth\ProfileController@showUpdateForm')->name('profile');
		Route::post('profile', 'Auth\ProfileController@update')->name('profile');

	});
});