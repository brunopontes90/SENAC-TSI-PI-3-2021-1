@extends('layouts.store')
@section('content')
<h2>Carrinho</h2>
{{ $cart }}
<table class="table table-striped">
    <thead>
        <tr>
            <th>Produto</th>
            <th></th>
            <th>Quantidade</th>
            <th></th>
            <th>Preço</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @php
            $total = 0;
        @endphp



        @foreach($cart as $item)


            <tr>
                <td><img src="{{ asset($item->product()->image) }}" style="width:40px"></td>
                <td><a href="{{ route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a></td>
                <td><span>{{ $item->quantity }}</span></td>
                <td>
                    <a href="{{ route ('cart.add', $item->product()->id) }}" class="btn btn-success">+</a>
                    <a href="{{ route ('cart.remove', $item->product()->id) }}" class="btn btn-warning">-</a>
                </td>

                <!--
                <td>
                    <span> R$ {{ $item->product()->price * $item->quantity, 2, ',' , '.' }} (R$ {{ $item->product()->price }})</span>


                @php
                    $total += $item->product()->price * $item->quantity;
                @endphp



                </td>
                -->
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex flex-column flex-wrap aling-items-end">
<span class="h3 mx-05">total da compra R$ {{ number_format($total, 2, ',' , '.') }}</span>
    <a href="{{ route('cart.payment')}}" class="btn btn-lg button-primary">Pagar</a>
</div>
@endsection









<!--

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
</head>
<body class="container bg-secondary mb-5">
    @include('layouts.menu')
    <main class="container mt-5">
        <h1 class="text-uppercase text-center text-white fw-bold">Carrinho</h1>
        <div class="row p-3 mb-5 bg-dark rounded" style="box-shadow: 2px 3px 3px 0px #FFFFFF">
            <table class="table table-striped">
                <thead>
                    <tr class="text-white text-center">
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $total = 0;
                    @endphp

                    @foreach($cart as $item)
                        <tr class="text-white">
                            <td><img src="{{ asset($item->product()->image) }}" style="width:40px"></td>
                            <td><a href="{{ route('product.show'), $item->product()->id}}">{{ $item->product()->name }}</a></td>
                            <td><span>{{ $item->quantity}}</span></td>
                            <td>
                                <a href="{{ route ('cart.add', item->product()->id) }}" class="btn btn-success">+</a>
                                <a href="{{ route ('cart.remove', item->product()-id) }}" class="btn btn-warning">-</a>
                            </td>
                            <td>
                                <span> R$ {{ $item->product()->price * $item->quantity, 2, ',' , '.' }} (R$ {{ $item->product()->price }})</span>
                            @php
                                $total += $item->product()->price * $item->quantity;
                            @endphp
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex flex-column flex-wrap aling-items-end">
            <span class="h3 mx-05 text-center text-uppercase fw-bold text-white">total da compra R$ {{ number_format($total, 2, ',' , '.') }}</span>
        </div>
        <div class="text-center mt-2">
            <a href="{{ route('cart.payment')}}" class="btn btn-lg btn-primary text-uppercase fw-bold m-5">Pagar</a>
        </div>
    </main>
</body>
</html>

-->

