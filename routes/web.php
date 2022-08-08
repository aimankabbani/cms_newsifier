<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminArticleController;
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


Route::prefix('admin')->group(function(){
  Route::get('/', [AdminController::class,'index'])->name('admin.view');

  // Users
  Route::get('users',[AdminUserController::class,'index'])->name('admin.user.view');
  Route::post('users',[AdminUserController::class,'data'])->name('admin.user.data');
  Route::get('user/create',[AdminUserController::class,'createPage'])->name('admin.user.create.view');
  Route::post('user/create',[AdminUserController::class,'createPost'])->name('admin.user.create');
  Route::get('user/edit/{id}',[AdminUserController::class,'editPage'])->name('admin.user.edit');
  Route::post('user/delete/{id}',[AdminUserController::class,'delete'])->name('admin.user.delete');

  // Articles
  Route::get('articles',[AdminArticleController::class,'index'])->name('admin.article.view');
  Route::post('articles',[AdminArticleController::class,'data'])->name('admin.article.data');
  Route::get('article/create',[AdminArticleController::class,'createPage'])->name('admin.article.create.view');
  Route::post('article/create',[AdminArticleController::class,'createPost'])->name('admin.article.create');
  Route::get('article/edit/{id}',[AdminArticleController::class,'editPage'])->name('admin.article.edit');
  Route::post('article/delete/{id}',[AdminArticleController::class,'delete'])->name('admin.article.delete');
});