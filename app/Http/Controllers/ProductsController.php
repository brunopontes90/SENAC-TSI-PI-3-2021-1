<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index(){
        return view('product.index')->with('products', Product::all());
    }

    public function create(){
        return view('product.create')->with('categories', Category::all());

    }

    public function store(Request $request){
        Product::create($request->all());
        session()->flash('Success', 'Produto cadastrado com sucesso');
        return redirect(route('product.index'));
    }

    public function edit(Product $product){
        return view('product.edit')->with(['product' => $product, 'categories'=>Category::all()]);
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

    public function trash(){
        return view('product.trash')->with('products', Product::onlyTrashed()->get());
    }

    public function restore($id){
        $product = Product::onlyTrashed()->where('id', $id)->firstOrFail();
        $product->restore();
        session()->flash('success', 'Produto foi restaurado com sucesso!');
        return redirect(route('product.trash'));
    }


}
