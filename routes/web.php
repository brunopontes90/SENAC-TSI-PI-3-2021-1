<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/category', CategoriesController::class);
Route::resource('/front', ProductsController::class);
Route::resource('/tag', TagController::class);
