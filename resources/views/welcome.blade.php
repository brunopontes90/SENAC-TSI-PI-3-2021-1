@extends('layouts.store')
@section('css')
<style>
    #banner {
        background: url('https://raw.githubusercontent.com/brunopontes90/jogos-colecao/master/img/banner.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 10px;
        height: 400px;

    }
    #console{
        border: solid 3px #FF8000;
        border-radius: 10px;
        box-shadow:  0px 5px 10px 0px #000000;
        height: 200px;
        width: 200px:
    }

    #main{
        border-radius: 10px;
        box-shadow: 0px 5px 10px 0px #6E6E6E;
    }
</style>
@endsection

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 text-center" id="main">
    <section id="banner" class="d-flex align-items-center p-4">
        <div class="text-white">
            <span class="h2 d-block text-capitalize mb-0">Toda loja em</span>
            <span class="h1 d-block text-uppercase fw-bold mb-3">Promoção</span>
            <button class="btn btn-lg btn-primary">Veja nosso produtos</button>
        </div>
    </section>
    <section>
        <div class="row py-5">
            <div class=" text-center my-2 text-uppercase">
                <h2 class="fw-bold">Produtos em Promoção</h2>
                <span class="text-muted fw-bold">Venha conferir nossos produtos</span>
            </div>
        </div>
        <div class="row d-flex justify-content-around">
            @foreach(\App\Models\Product::promocoes() as $product)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="text-center">
                        <img src="{{ asset($product->image)}}" id="console">
                    </div>
                    <div class="text-center mt-4">
                        <span class="h5 d-block fw-bold text-uppercase">{{$product->name}}</span>
                        <span class="d-block text-uppercase text-muted">R${{$product->price}}</span>
                    </div>

                        {{-- BOTAO VISUALIZAR --}}
                        <div class="mb-5">
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Visualizar</a>
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar Carrinho</a>
                        </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
