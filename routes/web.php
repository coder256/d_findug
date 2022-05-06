<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::resource('user', 'App\Http\Controllers\UserController')->middleware('auth');
Route::get('item/filter/pending',[ItemController::class,'pending'])->name('item.pending');
Route::get('item/filter/taken',[ItemController::class,'taken'])->name('item.taken');
Route::put('item/approve/{id}',[\App\Http\Controllers\ItemController::class,'approve'])->name('item.approve');
Route::resource('item', 'App\Http\Controllers\ItemController')->middleware('auth');
Route::resource('item-request', 'App\Http\Controllers\ItemRequestController')->middleware('auth');
