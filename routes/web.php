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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();



Route::group(['middleware' => ['web']], function () {
    Route::get('storage/{filename}', function ($filename) {
        return Storage::get($filename);
    });
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home', 'HomeController@store')->name('home.store');
    Route::post('/home/ajaxRequest', 'HomeController@ajaxRequestPost');
    Route::get('attendance', ['as' => 'attendance.index', 'uses' => 'MissingAttendanceController@index']);
    Route::post('attendance', ['as' => 'attendance.store', 'uses' => 'MissingAttendanceController@store']);
    Route::post('attendance/reject{id}', ['as' => 'attendance.reject', 'uses' => 'MissingAttendanceController@reject']);
    Route::post('attendance/approve{id}', ['as' => 'attendance.approve', 'uses' => 'MissingAttendanceController@approve']);
    
});

