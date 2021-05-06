<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect('/login');
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


    Route::resource('/category', CategoriesController::class)->middleware(['auth']);
    Route::get('/trash/category', [CategoriesController::class, 'trash'])->name('category.trash');
    Route::patch('/category/restore/{Category}', [CategoriesController::class, 'restore'])->name('category.restore');

    Route::resource('/tag', TagController::class)->middleware(['auth']);
    Route::get('/trash/tag', [TagController::class, 'trash'])->name('tag.trash');
    Route::patch('/tag/restore/{Tag}', [TagController::class, 'restore'])->name('tag.restore');

});

Route::resource('/product', ProductsController::class, ['only' => ['show']]);


