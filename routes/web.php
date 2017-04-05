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
	Route::get('/', ['middleware' => 'auth', function () {
		return view('layouts.panel');
	}]);

	/*Route::group(['prefix' => 'bot'], function () {
		Route::get('home', 'Bot\BotController@home');
	});*/

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