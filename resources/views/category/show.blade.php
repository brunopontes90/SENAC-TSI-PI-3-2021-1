@extends('layouts.store')
@section('content')
<section>
    <div class="row py-5">
        <div class=" text-center my-2">
            <h2>{{ $category->name}}</h2>
            <span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero rem delectus quas? Optio saepe maxime totam nulla assumenda? Voluptas cumque mollitia libero quos necessitatibus voluptate sapiente autem ab dolore esse.</span>
        </div>
    </div>
    <div class="row">
        @foreach($category->products as $product)
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="text-center" style="height= 250px">
                    <img src="{{ asset($product->image) }}" class="h-100">
                </div>
                <div class="text-center">
                    <span class="d-block fw-bold">$product->name</span>
                    <span class="d-block">R${{$product->price}}</span>
                    <div class="mt-2">
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Visualizar</a>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn-primary">Adicionar carrinho</a>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</section

@endsection
