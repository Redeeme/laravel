<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
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


Route::view("/clanky",'clanky');
Route::view("/o_nas",'o_nas');
Route::view("/index",'index');
Route::view("/login",'login');
Route::view("/profile",'profile');
Route::view("/clanok",'clanok');
Route::view("/test",'test');
Route::get('/clanky',[BlogController::class,'index']);
Route::get('edit/{id}',[ProfileController::class,'edit']);
Route::post('update',[ProfileController::class,'update'])->name('update');
Route::post('crete',[ProfileController::class,'crete'])->name('crete');
Route::get('delete/{id}',[ProfileController::class,'delete']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
