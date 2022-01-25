<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Auth'], function () {
    // Login
    Route::get('login',                     'LoginController@showLoginForm')->name('login');
    Route::post('login',                    'LoginController@login');
    Route::post('logout',                   'LoginController@logout')->name('logout');

    // forgot password
    Route::get('forgot',                    'DashboardController@showForgetPasswordForm')->name('forgot_password_show');
    Route::post('forgot-password',          'DashboardController@submitForgetPasswordForm')->name('forgot_password');
});

Route::group(['middleware' => 'auth:university'], function () {

    // Dashboard
    Route::get('dashboard',                 'Auth\DashboardController@index')->name('main');
    Route::get('show-edit-profile',         'Auth\DashboardController@showEditProfile')->name('show_edit_profile');
    Route::put('update-profile/{id}',       'Auth\DashboardController@editProfile')->name('update_profile');
    Route::get('change-password-show',      'Auth\DashboardController@showChangePassword')->name('show_change_password');
    Route::post('change-password',          'Auth\DashboardController@changePassword')->name('change_password');

    // college
    Route::resource('college',               Auth\CollegeController::class);
    Route::get('college-status',            'Auth\CollegeController@status')->name('college_status');

    // Common Setting
    Route::get('common-setting',            'Auth\CommonSettingController@index')->name('common_setting');
    Route::post('store-percentage',         'Auth\CommonSettingController@store')->name('store_percentage');

    // Course
    Route::resource('course',                Auth\CourseController::class);
    Route::get('list-subject',              'Auth\CourseController@indexSubject')->name('list_subject');
    Route::get('course-status',             'Auth\CourseController@status')->name('course_status');

    // merit round
    Route::resource('meritround',            Auth\MeritRoundController::class);
    Route::get('meritround-status',         'Auth\MeritRoundController@status')->name('meritround_status');
    
    // student
    Route::resource('student',            Auth\StudentAdmissionController::class);
    Route::get('student-status',          'Auth\StudentAdmissionController@studentStatus')->name('student_status');
});