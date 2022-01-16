<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBlogsController;
use App\Http\Controllers\CommentController;
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


Route::view("/clanky",'clanky')->name('clanky');
Route::view("/o_nas",'o_nas')->name('o_nas');
Route::view("/index",'index')->name('index');
Route::view("/login",'login')->name('login');
Route::view("/profile",'profile')->name('profile');
Route::get('/clanky',[BlogController::class,'index'])->name('clanky');
Route::get('edit',[ProfileController::class,'edit']);
Route::post('update',[ProfileController::class,'update'])->name('update');
Route::get('delete',[ProfileController::class,'delete']);
Route::get('/clanky_pouzivatelov',[UserBlogsController::class,'index'])->name('clanky_pouzivatelov');
Route::post('/add_blog',[UserBlogsController::class,'addBlog'])->name('add.blog');
Route::get('/getUserBlogsList',[UserBlogsController::class,'getUserBlogsList'])->name('get.userBlogs.list');

Route::get('/clanky/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/comments/{blog_id}',[CommentController::class,'store'])->name('comments.add');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
