<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('welcome');
});

//RODA DO INDEX
Route::get('/front', [ProductsController::class, 'index'])->name('front.index');

//ROTA DE LISTA PRODUTOS
Route::get('/front/products', [ProductsController:: class, 'products'])->name('front.products');

//ROTA DE CRIAR PRODITOS
Route::get('/front/create', [ProductsController:: class, 'create'])->name('front.create');

//ROTA DE EDITAR PRODUTOS
Route::get('front/edit', [ProductsController::class, 'edit'])->name('front.edit');

//ROTA DE SALVAR NO BANCO
Route::post('/front/store', [ProductsController::class, 'store'])->name('front.store');

//ROTA DE ATUALIZAR PRODUTO
Route::post('/front/update/{product}', [ProductsController::class, 'update'])->name('front.update');

//ROTA DE DELETAR PRODUTO
Route::get('/front/destroy/{product}', [ProductsController::class, 'destroy'])->name('front.destroy');


