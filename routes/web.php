<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBlogsController;
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
Route::get('/clanky',[BlogController::class,'index']);
Route::get('edit',[ProfileController::class,'edit']);
Route::post('update',[ProfileController::class,'update'])->name('update');
Route::post('crete',[ProfileController::class,'crete'])->name('crete');
Route::get('delete',[ProfileController::class,'delete']);
Route::get('/clanky_pouzivatelov',[UserBlogsController::class,'index'])->name('clanky_pouzivatelov');
Route::post('/add_blog',[UserBlogsController::class,'addBlog'])->name('add.blog');
Route::get('/getUserBlogsList',[UserBlogsController::class,'getUserBlogsList'])->name('get.userBlogs.list');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
