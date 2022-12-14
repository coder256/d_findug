<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', 'App\Http\Controllers\UserController')->middleware('auth');
Route::resource('item', 'App\Http\Controllers\ItemController')->middleware('auth');
Route::resource('item-request', 'App\Http\Controllers\ItemRequestController')->middleware('auth');
