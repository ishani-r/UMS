<?php

use App\Http\Controllers\AdminssionController;
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
});
Route::get('demo', function () {
    return view('demo');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', function () {
        return view('layouts.content');
    })->name('main');

// Admission
Route::get('form',      [AdminssionController::class, 'showAdmissionForm'])->name('admission_form');
Route::post('store',      [AdminssionController::class, 'store'])->name('admission_store');

// Marks
Route::get('mark',      [StudentMarksController::class, 'index'])->name('show_marks');
