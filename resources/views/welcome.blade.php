@include('layouts.menu')
@section('css')
<style>
    #banner{
        background: url('https://via.placeholder.com/2000x800');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 400px:
    }
</style>
@endsection

{{-- @section('content') --}}
<section id="banner" class="d-flex alingn-items-center p-4">
    <div>
        <span class="h2 d-block text-captalize mb-0">Toda loja aqui</span>
        <span class="h1 d-block text-uppercase fw-bold mb-3">Promoções</span>
        <button class="btn btn-lg btn-primary">Veja nosso produtos</button>
    </div>
</section>
<section>
    <div class="row py-5">
        <div class=" text-center my-2">
            <h2>Produtos em promoção</h2>
            <span class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero rem delectus quas? Optio saepe maxime totam nulla assumenda? Voluptas cumque mollitia libero quos necessitatibus voluptate sapiente autem ab dolore esse.</span>
        </div>
    </div>
    <div class="row">
        @foreach(\App\Models\Product::promocoes() as $product)
            <div class="col-lg-4 col-md-6 col-sm-10">
                <div class="text-center">
                    <img src="{{ asset($product->image)}}" class="h-100" style="height: 200px">
                </div>
                <div class="text-center">
                    <span class="d-block fw-bold">{{$product->name}}</span>
                    <span class="d-block">R${{$product->price}}</span>
                    <div class="mt-2">
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary">Visualizar</a>
                        <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Adicionar carrinho</a>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

@include('layouts.store')
{{-- @include('layouts.footer') --}}
{{-- @endsection --}}
