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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('/');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
// Route::post('/updatePost', 'AdminController@postUpdate');
Route::post('admin/updatePost', [App\Http\Controllers\AdminController::class, 'postUpdate'])->name('admin.updatePost');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/post',[App\Http\Controllers\PostController::class, 'store'])->name('post');