<?php

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

Route::get('/', 'SchedulesController@index')->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/user', 'UserController')->middleware('auth');

Route::resource('/schedule', 'SchedulesController')->middleware('auth');

Route::resource('/calendar', 'CalendarController')->middleware('auth');

Route::get('/calendar/{year}/{month}/{day}', 'CalendarController@showDay')->middleware('auth');