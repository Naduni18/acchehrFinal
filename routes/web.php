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
Route::group(['middleware' => 'guest'], function () {
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

});


Route::group(['middleware' => ['web']], function () {
    Route::get('storage/{filename}', function ($filename) {
        return Storage::get($filename);
    });
    Auth::routes();
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('profile.edit');
    });
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
    
    Route::get('/trainingSchedule', 'TrainingScheduleController@index')->name('trainingSchedule');
    Route::post('/trainingSchedule/store', 'TrainingScheduleController@store')->name('trainingSchedule.store');
    Route::post('/trainingSchedule/delete', 'TrainingScheduleController@delete')->name('trainingSchedule.delete');
    Route::post('/trainingScheduleEdit', 'TrainingScheduleEditController@index')->name('trainingScheduleEdit');
    Route::post('/trainingScheduleEdit/store', 'TrainingScheduleEditController@store')->name('trainingScheduleEdit.store');

    Route::get('/advance_payment', 'AdvanceRequestsController@index')->name('advance_payment');
    Route::post('/advance_payment/store', 'AdvanceRequestsController@store')->name('advance_payment.store');
    Route::post('/advance_payment/destroy', 'AdvanceRequestsController@destroy')->name('advance_payment.destroy');
    Route::post('/advance_payment/update', 'AdvanceRequestsController@update')->name('advance_payment.update');
    Route::post('/advance_payment/approve', 'AdvanceRequestsController@approve')->name('advance_payment.approve');
    Route::post('/advance_payment/reject', 'AdvanceRequestsController@reject')->name('advance_payment.reject');

    Route::post('/advance_payment/index2', 'AdvanceRequestsController@index2')->name('advance_payment.index2');

    Route::get('/dailyAttendance', 'DailyAttendanceController@index')->name('dailyAttendance');
    Route::post('/dailyAttendance/import', 'DailyAttendanceController@import')->name('dailyAttendance.import');
    Route::get('/dailyAttendance/export', 'DailyAttendanceController@export')->name('dailyAttendance.export');
    Route::get('/dailyAttendance/export_this_month', 'DailyAttendanceController@export_this_month')->name('dailyAttendance.export_this_month');

    Route::get('/recruitment', 'RecruitmentController@index')->name('recruitment');
    Route::post('/recruitment/store', 'RecruitmentController@store')->name('recruitment.store');
    Route::post('/recruitment/destroy', 'RecruitmentController@destroy')->name('recruitment.destroy');
    Route::post('/recruitment/update', 'RecruitmentController@update')->name('recruitment.update');

    Route::post('/recruitment/index2', 'RecruitmentController@index2')->name('recruitment.index2');
    Route::get('/recruitment/download_file/{file_name}', 'RecruitmentController@download_file')->name('recruitment.download_file');

    Route::get('/salaryManagements', 'SalaryManagementsController@index')->name('salaryManagements');
    Route::get('/salaryManagements/export', 'SalaryManagementsController@export')->name('salaryManagements.export');

    Route::get('/skill_rating', 'SkillRatingController@index')->name('skill_rating');
    Route::post('/skill_rating/index2', 'SkillRatingController@index2')->name('skill_rating.index2');
    Route::post('/skill_rating/store', 'SkillRatingController@store')->name('skill_rating.store');
});

