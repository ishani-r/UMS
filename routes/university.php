<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Auth'], function () {
    // Login
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // forgot password
    Route::get('forgot',           'DashboardController@showForgetPasswordForm')->name('forgot_password_show');
    Route::post('forgot-password', 'DashboardController@submitForgetPasswordForm')->name('forgot_password');
});

Route::group(['middleware' => 'auth:university'], function () {

    // Route::get('/dashboard', function () {
    //     return view('University.layouts.content');
    // })->name('main');

    // college
    Route::resource('college',              Auth\CollegeController::class);
    Route::get('college-status',           'Auth\CollegeController@status')->name('college_status');

    // Common Setting
    Route::get('common-setting',         'Auth\CommonSettingController@index')->name('common_setting');
    Route::post('store-percentage',      'Auth\CommonSettingController@store')->name('store_percentage');

    Route::get('dashboard', 'Auth\DashboardController@index')->name('main');

});
