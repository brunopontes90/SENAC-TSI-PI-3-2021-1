<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CartsController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ROTA PARA LAYOUTS
Route::get('layouts', function(){
    return view('layouts.menu-index');
});

Route::group(['middleware' => 'isAdmin'], function() {
    Route::resource('/product', ProductsController::class, ['except' => ['show']]);
    Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
    Route::patch('/product/restore/{Product}', [ProductsController::class, 'restore'])->name('product.restore');
    /*Route::post('/product/search')*/


    Route::resource('/category', CategoriesController::class, ['except' => ['show']]);
    /*Route::resource('/category', CategoriesController::class)->middleware(['auth']);*/
    Route::get('/trash/category', [CategoriesController::class, 'trash'])->name('category.trash');
    Route::patch('/category/restore/{Category}', [CategoriesController::class, 'restore'])->name('category.restore');

    Route::resource('/tag', TagController::class, ['except' => ['show']]);
    /*Route::resource('/tag', TagController::class)->middleware(['auth']);*/
    Route::get('/trash/tag', [TagController::class, 'trash'])->name('tag.trash');
    Route::patch('/tag/restore/{Tag}', [TagController::class, 'restore'])->name('tag.restore');

});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/cart/add/{product}', [CartsController::class, 'add'])->name('cart.add'); /*Carrinho*/
    Route::get('/cart/remove/{product}', [CartsController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CartsController::class, 'show'])->name('cart.show');
});

Route::resource('/product', ProductsController::class, ['only' => ['show']]);
Route::resource('/category', CategoriesController::class, ['only' => ['show']]);
Route::resource('/tag', TagController::class, ['only' => ['show']]);
