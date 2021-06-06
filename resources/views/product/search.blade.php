@extends('layouts.store')
@section('content')
<style>
    #console{
        border: solid 3px #FF8000;
        border-radius: 10px;
        box-shadow:  0px 5px 10px 0px #000000;
        height: 200px;
        width: 200px:
    }
</style>
<section class="col-lg-12 col-md-6 col-sm-3 text-center" style="box-shadow: 0px 5px 10px 0px #6E6E6E">
    <div class="row py-5">
        <div class=" text-center my-2">
            <h2 class="fw-bold">{{$search}}</h2>
            <span class="text-muted fw-bold">Produto Pesquisado</span>
        </div>
    </div>
    <div class="row d-flex justify-content-around">
        @foreach($products as $product)
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="text-center" style="height= 250px">
                   <img src="{{ asset($product->image)}}" id="console">
                </div>
                <div class="text-center mt-4">
                    <span class="d-block fw-bold">{{$product->name}}</span>
                    <span class="d-block text-uppercase text-muted">R${{$product->price}}</span>
                    <div class="mb-5">
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Visualizar</a>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar carrinho</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section

@endsection
