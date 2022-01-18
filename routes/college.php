<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Auth'], function () {
    // Login
    Route::get('login',                         'LoginController@showLoginForm')->name('login');
    Route::post('login',                        'LoginController@login');
    Route::post('logout',                       'LoginController@logout')->name('logout');

    // Register
    Route::get('register',                      'RegisterController@registerForm')->name('register');
    Route::post('college-register',             'RegisterController@store')->name('college_register');
});

Route::group(['middleware' => 'auth:college'], function () {

    // Dashboard
    Route::get('dashboard',                     'Auth\DashboardController@index')->name('main');
    Route::get('show-edit-profile',             'Auth\DashboardController@showEditProfile')->name('show_edit_profile');
    Route::put('update-profile/{id}',           'Auth\DashboardController@editProfile')->name('update_profile');
    Route::get('change-password-show',          'Auth\DashboardController@showChangePassword')->name('show_change_password');
    Route::post('change-password',              'Auth\DashboardController@changePassword')->name('change_password');

    // Course
    Route::resource('college-course',            Auth\CollegeCourseController::class);

    // Merit Round
    Route::resource('meritround',                Auth\CollegeMeritController::class);
    Route::post('sel-round',                    'Auth\CollegeMeritController@selRound')->name('sel_round');
    Route::post('edit-sel-round',               'Auth\CollegeMeritController@editSelRound')->name('edit_sel_round');

    // Student Admission
    Route::get('index',                         'Auth\StudentAdmissionController@index')->name('show_s_admission');
    Route::post('delete/{id}',                  'Auth\StudentAdmissionController@delete')->name('delete');
});