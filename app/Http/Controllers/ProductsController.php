<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        return view('product.index')->with('products', Product::all());
    }
    /*
    public function products(){
        return view('product.products')->with('product', Product::all());
    }
    */
    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        Product::create($request->all());
        session()->flash('Success', 'Produto cadastrado com sucesso');
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        return view('product.edit')->with('product', $product);
    }

    //public function update(Product $product, Resquest $request)

    public function update(Request $request, Product $product){
        $product->update($request->all());
        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('product.index'));
    }
        public function destroy(Product $product){
        $product->delete();
        session()->flash('success', 'Produto deletado com sucesso!');
        return redirect(route('product.index'));
    }

    public function show(Product $product){

    }
}
