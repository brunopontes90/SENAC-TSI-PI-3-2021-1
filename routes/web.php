<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

//RODA DO FRONT
Route::get('/front', [ProductsController::class, 'index'])->name('front.index');
Route::get('/front/products', [ProductsController:: class, 'products'])->name('front.products');
Route::get('/front/create', [ProductsController:: class, 'create'])->name('front.create');
Route::get('front/edit', [ProductsController::class, 'edit'])->name('front.edit');
Route::post('/front/store', [ProductsController::class, 'store'])->name('front.store');
Route::post('/front/update/{product}', [ProductsController::class, 'update'])->name('front.update');
Route::get('/front/destroy/{product}', [ProductsController::class, 'destroy'])->name('front.destroy');


//ROTA DA CATEGORY
Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoriesController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');
Route::get('/category/destroy/{category}', [CategoriesController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit/{category}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{category}', [CategoriesController::class, 'update'])->name('category.update');


//ROTA DA TAG
Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
Route::get('/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('/tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');

// Route::resource('/category', CategoriesController::class);
// Route::resource('/front', ProductsController::class);
// Route::resource('/tag', TagController::class);
