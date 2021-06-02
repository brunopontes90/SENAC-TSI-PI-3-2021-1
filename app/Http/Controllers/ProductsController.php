<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;


class ProductsController extends Controller
{
    public function index(){
        return view('product.index')->with('products', Product::all());
    }

    public function create(){
        return view('product.create')->with(['categories' => Category::all(), 'tags' => Tag::all()]);

    }

    public function store(Request $request){
        if($request->image){
            $image = $request->file('image')->store('product');
            $image = "storage/".$image;
        }else{
            $image = "storage/product/semImagem.jpg";
            }


        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image
        ]);

        $product->tags()->sync($request->tags);

        session()->flash('success', 'Produto foisalvo com sucesso !');
        return redirect(route('product.index'));



    }

    public function edit(Product $product){
        return view('product.edit')->with(['product' => $product, 'categories'=>Category::all(), 'tags' => Tag::all()]);
    }

    //public function update(Product $product, Resquest $request)

    public function update(Request $request, Product $product){
         if($request->image){
            $image = $request->file('image')->store('product');
            $image = "storage/app/public/product".$image;
            if($product->image != "storage/app/public/product/semImagem.jpg"){
                Storage::delete(str_replace('storage/', '', $product->image));
            }
        }else{
            $image = $product->image;
            }

        $product->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image
        ]);

        $product->tags()->sync($request->tags);

        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('product.index'));
    }
        public function destroy(Product $product){
        $product->delete();
        session()->flash('success', 'Produto deletado com sucesso!');
        return redirect(route('product.index'));
    }

    public function show(Product $product){
        return view('product.show')->with('product', $product);
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


    public function search(Request $request){
        $products = Product::where('name', 'like', '%'.$request->search.'%');
        return view('product.search')->with(['search' => $request->search, 'products' => $products->paginate(3)]);
    }


}
