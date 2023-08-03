<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\ContentController;

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


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/category/create', [App\Http\Controllers\Blog\ContentController::class, 'create']);
Route::resource('category', ContentController::class);
