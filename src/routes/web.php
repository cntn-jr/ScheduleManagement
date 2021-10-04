<?php

use App\Http\Controllers\UserController;
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

Route::get('/user/{id}/confirm_password', 'UserController@confirmPasswordView')->middleware('auth')->name('user.confirm_password');

Route::post('/user/{id}/confirm_password', 'UserController@confirmPasswordFunc')->middleware('auth')->name('user.confirm_password');

Route::get('/user/{id}/change_password', 'UserController@changePassword')->middleware('auth')->name('user.change_password');

Route::put('/user/{id}/update_password', 'UserController@updatePassword')->middleware('auth')->name('user.update_password');

Route::resource('/schedule', 'SchedulesController')->middleware('auth')->middleware('cors');

Route::resource('/calendar', 'CalendarController')->middleware('auth');

Route::get('/calendar/{year}/{month}/{day}', 'CalendarController@showDay')->middleware('auth');