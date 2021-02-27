<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){
        return view('front.index');
    }
    public function products(){
        return view('front.products');
    }
    public function create(){
        return view('front.create');
    }

    public function store(Request $request){
        Product::create($request->all());
        session()->flash('Success', 'Produto cadastrado com sucesso');
        return redirect(route('front.products'));
    }

    public function edit(Product $product){
        return view('front.edit')->with('front', $product);
    }

    public function destroy(Product $product){
        $product->delete();
        session()->flash('success', 'Produto deletado com sucesso!');
        return redirect(route('front.products'));
    }

    public function update(Product $product, Resquest $request){
        $product->update($request->all());
        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('front.products'));
    }
}
