<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;


Route::get('/', function () {
    return view('welcome');
});

//RODA DO product
Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
//Route::get('/product/products', [ProductsController:: class, 'products'])->name('product.products');
Route::get('/product/create', [ProductsController:: class, 'create'])->name('product.create');
Route::get('/product/edit/{product}', [ProductsController::class, 'edit'])->name('product.edit');
Route::post('/product/store', [ProductsController::class, 'store'])->name('product.store');
Route::post('/product/update/{product}', [ProductsController::class, 'update'])->name('product.update');
Route::get('/product/destroy/{product}', [ProductsController::class, 'destroy'])->name('product.destroy');


//ROTA DA CATEGORY
Route::get('/category', [CategoriesController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoriesController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoriesController::class, 'store'])->name('category.store');
Route::get('/category/destroy/{category}', [CategoriesController::class, 'destroy'])->name('category.destroy');
Route::get('/category/edit/{category}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{category}', [CategoriesController::class, 'update'])->name('category.update');

/*
//ROTA DA TAG
Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag/store', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag/destroy/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
Route::get('/tag/edit/{tag}', [TagController::class, 'edit'])->name('tag.edit');
Route::post('/tag/update/{tag}', [TagController::class, 'update'])->name('tag.update');
*/


// Route::resource('/category', CategoriesController::class);
// Route::resource('/product', ProductsController::class);
Route::resource('/tag', TagController::class);
