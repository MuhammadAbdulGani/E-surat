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

// Admin Routes
Route::prefix(config('app.admin_path'))->name('admin.')->namespace('Admin')->group(function () {
	Route::get('/', function () {
		return redirect()->route('admin.home');
	});

	Route::get('login', 'AuthController@index')->name('login');
	Route::post('login', 'AuthController@login')->name('login');
	Route::post('logout', 'AuthController@logout')->name('logout');

	Route::middleware('auth:admin')->group(function () {
		Route::get('home', 'HomeController@index')->name('home');

		Route::prefix('submissions')->name('submissions.')->group(function () {
			Route::get('pending', 'SubmissionController@pending')->name('pending');
			Route::get('approved', 'SubmissionController@approved')->name('approved');
			Route::get('rejected', 'SubmissionController@rejected')->name('rejected');
			Route::get('letter-out', 'SubmissionController@letterOut')->name('letter-out');
			Route::get('letter-out/{submission_id}/create', 'SubmissionController@letterOutCreate')->name('letter-out.create');
			Route::post('letter-out/{submission_id}/create', 'SubmissionController@letterOutStore')->name('letter-out.store');
			Route::post('approved/export', 'SubmissionController@exportApproved')->name('approved.export');
			Route::get('show/{id}', 'SubmissionController@show')->name('show');
			Route::patch('status/{id}/{status}', 'SubmissionController@status')->name('status');
			Route::patch('update/{id}', 'SubmissionController@update')->name('update');
			Route::post('print/{id}', 'SubmissionController@print')->name('print');
			Route::post('disposisi/{id}', 'SubmissionController@disposisi')->name('disposisi');
		});



		Route::resource('data', 'AdminController');
		Route::resource('users', 'UserController');
		Route::resource('letters', 'LetterController');
		Route::resource('signatories', 'SignatoryController');
		Route::view('helpers', 'admin.helper.index')->name('helpers');

		Route::prefix('import')->name('import.')->group(function () {
			Route::post('data', 'ImportController@admin')->name('data');
			Route::post('users', 'ImportController@user')->name('users');
		});

		Route::prefix('account')->group(function () {
			Route::get('/', 'AccountController@index')->name('account');
			Route::patch('/', 'AccountController@update')->name('account');
			Route::name('account.')->group(function () {
				Route::get('password', 'AccountController@password')->name('password');
				Route::patch('password', 'AccountController@patchPassword')->name('password');
				Route::get('logs', 'AccountController@logs')->name('logs');
			});
		});

		Route::prefix('settings')->name('settings')->group(function () {
			Route::get('/', 'SettingController@index');
			Route::patch('/', 'SettingController@update');
		});

		Route::prefix('datatables')->name('datatables.')->group(function () {
			Route::post('users', 'DataController@users')->name('users');
			Route::post('submissions/pending', 'DataController@submissionsPending')->name('submissions.pending');
			Route::post('submissions/approved', 'DataController@submissionsApproved')->name('submissions.approved');
			Route::post('submissions/rejected', 'DataController@submissionsRejected')->name('submissions.rejected');
		});
	});
});
require __DIR__ . '/user.php';
