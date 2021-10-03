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

 Route::get('/', [App\Http\Controllers\frontendController::class, 'index'])->name('index');

Auth::routes();

Route::group(['prefix'=>'admin'], function (){

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::post('/category', [App\Http\Controllers\categoryController::class, 'categoryStore'])->name('category');
Route::post('/category-update', [App\Http\Controllers\categoryController::class, 'categoryUpdate'])->name('category-update');
Route::get('/category-delete/{id}', [App\Http\Controllers\categoryController::class, 'categoryDestroy'])->name('category-delete');
Route::post('/newsadd', [App\Http\Controllers\categoryController::class, 'newsStore'])->name('newsadd');
Route::post('/news-update', [App\Http\Controllers\categoryController::class, 'newsUpdate'])->name('news-update');
Route::get('/news-delete/{id}', [App\Http\Controllers\categoryController::class, 'newsDestroy'])->name('news-delete');

});


