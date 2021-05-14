<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        return view('tag.index')->with('tags', Tag::all());
    }


    public function create()
    {
        return view('tag.create');
    }


    public function store(Request $request)
    {
        Tag::create($request->all()); //FAZ O INSERT
        session()->flash('success','Tag foi cadastrado com sucesso!');
        return redirect(route('tag.index')); //RETORNA PARA A TELA DE TAG
    }

      public function show(Tag $tag)
    {
        return view('tag.show');
    }

    public function edit(Tag $tag)
    {
        return view('tag.edit')->with('tag', $tag);
    }


    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        session()->flash('success','Tag alterado com sucesso!');
        return redirect(route('tag.index')); //RETORNA PARA A TELA DE TAG
    }

    public function destroy(Tag $tag)
    {
        if($tag->products()->count() > 0){
            session()->flash('success','Tag não pode ser deletada existem produtos com essa Tag');
            return redirect(route('tag.index')); //RETORNA PARA A TELA DE PRODUTO

        }

        $tag->delete();
        session()->flash('success','Tag apagadas com sucesso!');
        return redirect(route('tag.index')); //RETORNA PARA A TELA DE TAG
    }

    public function trash(){
        return view('tag.trash')->with('tags', Tag::onlyTrashed()->get());
    }


    public function restore($id){
        $tag = Tag::onlyTrashed()->where('id', $id)->firstOrFail();
        $tag->restore();
        session()->flash('success', 'Categoria foi restaurado com sucesso!');
        return redirect(route('tag.trash'));
    }

}
