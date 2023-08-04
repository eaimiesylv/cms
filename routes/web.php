<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::group(['middleware' => 'admin'], function () {
    Route::resource('category', App\Http\Controllers\Blog\ContentController::class);
    Route::resource('pages',  App\Http\Controllers\Blog\PageController::class);
    Route::resource('page_category',  App\Http\Controllers\Blog\PageCategoryController::class);
    Route::get('assign',  [App\Http\Controllers\Blog\ContentController::class,'page_category']);
});



