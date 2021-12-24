<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
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

Route::get('/', [MainController::class,'showArticles'])->name('showArticles');
Route::post('/editUser',[HomeController::class, 'editUser'])->name('editUser');
Route::get('/writeArticle',[HomeController::class, 'writeArticle'])->name('writeArticle');
Route::post('/saveArticle',[HomeController::class, 'saveArticle'])->name('saveArticle');
Route::get('/test',[HomeController::class, 'test'])->name('test');
Route::get('/article/{id}',[MainController::class,'showArticle'])->name('showArticle');
Route::post('/article/addComment/{id}',[HomeController::class, 'addComment'])->name('addComment');
Route::get('/userProfile/{id}',[MainController::class, 'showUserProfile'])->name('userProfile');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
