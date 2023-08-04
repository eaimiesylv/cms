<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Blog\ContentController;
//use App\Http\Controllers\Blog\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/template', function () {
    return view('template');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/category/create', [App\Http\Controllers\Blog\ContentController::class, 'create']);
Route::resource('category', App\Http\Controllers\Blog\ContentController::class);
Route::resource('pages',  App\Http\Controllers\Blog\PageController::class);
