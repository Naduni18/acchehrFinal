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
    
    Route::post('/edit_user/update', 'EditUserController@update')->name('edit_user.update');
    Route::post('/edit_user/store', 'EditUserController@store')->name('edit_user.store');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home/store', 'HomeController@store')->name('home.store');
    Route::post('/home/delete', 'HomeController@delete')->name('home.delete');
    Route::post('/editEvent', 'EditEventController@index')->name('editEvent');
    Route::post('/editEvent/store', 'EditEventController@store')->name('editEvent.store');
    

    Route::get('/advance_requests', 'AdvanceRequestsController@index')->name('advance_requests');
  
    Route::get('/attendance', 'MissingAttendanceController@index')->name('attendance');
    Route::post('/attendance/store', 'MissingAttendanceController@store')->name('attendance.store');
    Route::post('/attendance/destroy', 'MissingAttendanceController@destroy')->name('attendance.destroy');
    Route::post('/attendance/update', 'MissingAttendanceController@update')->name('attendance.update');
    Route::post('/attendance/approve', 'MissingAttendanceController@approve')->name('attendance.approve');
    Route::post('/attendance/reject', 'MissingAttendanceController@reject')->name('attendance.reject');

    Route::post('/attendance/index2', 'MissingAttendanceController@index2')->name('attendance.index2');

    Route::get('/leave', 'LeaveRequestController@index')->name('leave');
    Route::post('/leave/store', 'LeaveRequestController@store')->name('leave.store');
    Route::post('/leave/destroy', 'LeaveRequestController@destroy')->name('leave.destroy');
    Route::post('/leave/update', 'LeaveRequestController@update')->name('leave.update');
    Route::post('/leave/approve', 'LeaveRequestController@approve')->name('leave.approve');
    Route::post('/leave/reject', 'LeaveRequestController@reject')->name('leave.reject');

    Route::post('/leave/index2', 'LeaveRequestController@index2')->name('leave.index2');
    Route::get('/leave/download_file/{file_name}', 'LeaveRequestController@download_file')->name('leave.download_file');

    Route::get('/expenseClaim', 'ExpenseClaimRequestController@index')->name('expenseClaim');
    Route::post('/expenseClaim/store', 'ExpenseClaimRequestController@store')->name('expenseClaim.store');
    Route::post('/expenseClaim/destroy', 'ExpenseClaimRequestController@destroy')->name('expenseClaim.destroy');
    Route::post('/expenseClaim/update', 'ExpenseClaimRequestController@update')->name('expenseClaim.update');
    Route::post('/expenseClaim/approve', 'ExpenseClaimRequestController@approve')->name('expenseClaim.approve');
    Route::post('/expenseClaim/reject', 'ExpenseClaimRequestController@reject')->name('expenseClaim.reject');

    Route::post('/expenseClaim/index2', 'ExpenseClaimRequestController@index2')->name('expenseClaim.index2');
    Route::get('/expenseClaim/download_file/{file_name}', 'ExpenseClaimRequestController@download_file')->name('expenseClaim.download_file');
    
    
});

