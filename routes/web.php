<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBlogsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

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


Route::view("/clanky", 'clanky')->name('clanky');
Route::view("/o_nas", 'o_nas')->name('o_nas');
Route::view("/login", 'login')->name('login');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get("/index",[HomeController::class,'home'])->name('index');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/delete', [ProfileController::class, 'delete'])->name('profile.delete');

Route::get('/clanky/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/clanky', [BlogController::class, 'index'])->name('clanky');
Route::get('/add', [BlogController::class, 'add'])->name('admin.add');
Route::post('/clanky/add', [BlogController::class, 'addBlog'])->name('admin.addBlog');
Route::get('/editB/{blog_id}', [BlogController::class, 'edit'])->name('admin.edit');
Route::get('/deleteB/{blog_id}', [BlogController::class, 'deleteBlog'])->name('admin.delete');
Route::post('/clanky/editB/{blog_id}', [BlogController::class, 'editBlog'])->name('admin.editBlog');
Route::post('/clanky/podla_kategorie',[BlogController::class,'filterByCategory'])->name('filter');

Route::get('/clanky_pouzivatelov', [UserBlogsController::class, 'index'])->name('clanky_pouzivatelov');
Route::get('/clanky_pouzivatelov/{blog_id}', [UserBlogsController::class, 'showBlogUser'])->name('show.userBlog');
Route::post('/add_blog', [UserBlogsController::class, 'addBlog'])->name('add.blog');
Route::get('/getUserBlogsList', [UserBlogsController::class, 'getUserBlogsList'])->name('get.userBlogs.list');

Route::post("/edit_comment/{comment_id}", [CommentController::class, 'editComment'])->name('update.comment');
Route::post('/comments/{blog_id}', [CommentController::class, 'store'])->name('comments.add');
Route::get('/comments/{comment_id}', [CommentController::class, 'delete'])->name('comments.delete');

Route::post('/clanky',[CategoryController::class,'index'])->name('add.category');

Auth::routes();

