@extends('layouts.store')
@section('content')
<h2 class="mt-5">Carrinho</h2>
<table class="table table-striped mt-5">
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
<div class="d-flex flex-column flex-wrap aling-items-end">
<span class="h3">Total da compra R$ {{ number_format($total, 2, ',' , '.') }}</span>
    <a href="{{ route('cart.payment')}}" class="btn btn-lg btn-primary mt-3">Pagar</a>
</div>
@endsection
