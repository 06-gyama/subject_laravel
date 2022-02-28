<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// 他人のプロフィール画面
Route::get('/profile/{id}', [App\Http\Controllers\PostController::class, 'index'])->name('profile');
// 自分のプロフィール画面
Route::get('/profile', [App\Http\Controllers\PostController::class, 'userIndex'])->name('user_profile');

// 写真投稿
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('post');


// 会員削除画面
Route::get('/delete_confirm', [App\Http\Controllers\UsersController::class, 'delete_confirm'])->name('delete_confirm');
// 会員削除
Route::get('/destroy/{id}',[App\Http\Controllers\UsersController::class, 'destroy']);


// 会員編集画面
Route::get('/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('edit');
// 会員編集
Route::post('/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('update');
