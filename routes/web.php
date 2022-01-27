<?php

use App\Http\Controllers\AdminssionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentMarksController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('welcome');
Route::get('demo', function () {
    return view('demo');
});

// Social Login
Route::get('google', 'Auth\LoginController@redirectToProvider')->name('google');
Route::get('google/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('dashboard',                         [DashboardController::class, 'indexs'])->name('main');
Route::get('show-edit-profile',                 [DashboardController::class, 'showEditProfile'])->name('show_edit_profile');
Route::put('update-profile/{id}',               [DashboardController::class, 'editProfile'])->name('update_profile');
Route::get('change-password-show',              [DashboardController::class, 'showChangePassword'])->name('show_change_password');
Route::post('change-password',                  [DashboardController::class, 'changePassword'])->name('change_password');
Route::get('admis-status',                      [DashboardController::class, 'status'])->name('admis_status');

// Admission
Route::get('form',                              [AdminssionController::class, 'showAdmissionForm'])->name('admission_form');
Route::put('store/{id}',                        [AdminssionController::class, 'store'])->name('admission_store');
Route::post('sel-round-no',                     [AdminssionController::class, 'selRoundNo'])->name('sel_round_no');

// Marks
Route::get('mark',                              [StudentMarksController::class, 'index'])->name('show_marks');
Route::post('student-mark',                     [StudentMarksController::class, 'store'])->name('store_mark');