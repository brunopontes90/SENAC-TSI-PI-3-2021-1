<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        return view('category.index')->with('categories', Category::all());
    }
    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        Category::create($request->all()); //FAZ O INSERT
        session()->flash('success','Categoria foi cadastrado com sucesso!');
        return redirect(route('category.index')); //RETORNA PARA A TELA DE PRODUTO
    }

    public function destroy(Category $category){
        if($category->products()->count() > 0){
            session()->flash('success','Categoria não pode ser deletada existem produtos com essa categoria');
            return redirect(route('category.index')); //RETORNA PARA A TELA DE PRODUTO

        }
        $category->delete();
        session()->flash('success','Categoria apagada com sucesso!');
        return redirect(route('category.index')); //RETORNA PARA A TELA DE PRODUTO
}

    public function edit(Category $category){
        return view('category.edit')->with('category', $category);
    }


    public function update(Request $request, Category $category){
            $category->update($request->all());
            session()->flash('success','Categoria alterado com sucesso!');
            return redirect(route('category.index')); //RETORNA PARA A TELA DE PRODUTO
    }

    public function show(Category $category){
        return view('category.show')->with(['category'=> $category, 'products' => $category->products->paginate(3)]);
    }

    public function trash(){
        return view('category.trash')->with('categories', Category::onlyTrashed()->get());
    }

    public function restore($id){
        $category = Category::onlyTrashed()->where('id', $id)->firstOrFail();
        $category->restore();
        session()->flash('success', 'Categoria foi restaurado com sucesso!');
        return redirect(route('category.trash'));
    }
}
