<?php

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Auth'], function () {
    // Login
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Register
    Route::get('register',            'RegisterController@registerForm')->name('register');
    Route::post('college-register',   'RegisterController@store')->name('college_register');
});

Route::group(['middleware' => 'auth:college'], function () {

    Route::get('/dashboard', function () {
        return view('College.layouts.content');
    })->name('main');
});
