<?php


    Route::group(['namespace' => 'Auth'], function () {
    // Login
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    });

    Route::group(['middleware' => 'auth:college'], function () {

    Route::get('/dashboard', function () {
        return view('College.layouts.content');
    })->name('main');
});