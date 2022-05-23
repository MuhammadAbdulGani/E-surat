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

// User Routes
Route::get('/', function () {
	return redirect()->route('home');
});

Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@login')->name('login');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::middleware('auth')->group(function () {
	Route::get('home', 'HomeController@index')->name('home');
	Route::get('submissions', 'SubmissionController@index')->name('submissions.index');
	Route::post('submissions/store/{letter}', 'SubmissionController@store')->name('submissions.store');

	Route::prefix('account')->group(function () {
		Route::get('/', 'AccountController@index')->name('account');
		Route::name('account.')->group(function () {
			Route::post('whatsapp', 'AccountController@whatsapp')->name('whatsapp');
			Route::get('password', 'AccountController@password')->name('password');
			Route::patch('password', 'AccountController@patchPassword')->name('password');
			Route::get('logs', 'AccountController@logs')->name('logs');
		});
	});
});