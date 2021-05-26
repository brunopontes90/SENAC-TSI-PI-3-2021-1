@extends('layouts.store')
@section('content')
<h2>Lista de pedido</h2>
<div class="mx-5">
    <div class="accordion">
    @foreach(\App\Models\Order::where('user_id', '=', Auth()->user()->id)->get() as $order)
        <div class="accordion-item">
            <div class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#item-{{$order->id}}">
                    Peido N° {{$order->id}} ( {{$order->status }} )
                </button>
            </div>
            <div class="accordion-collapse collapse" id="item-{{ $ordem-id }}">
                <div class="accordion-body">
                    <div>
                        <p>{{ $order->address }}, {{ $order->address_number }}, {{$order->address_city}} -
                        {{ $order->address_state }}</p>
                        <p>pago com cartão: *{{ $order->cc_number }}</p>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th></th>
                                <th>Quantidade</th>
                                <th>Preço</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach($oder->items() as $item)
                                <tr>
                                    <td><img src="{{ asset($item->product()->image) }}" style="width:40px"></td>
                                    <td><a href="{{ route('product.show'), $item->product()->id}}">{{ $item->product()->name }}</a></td>
                                    <td><span>{{ $item->quantity}}</span></td>

                                    <td>
                                        <span> R$ {{ $item->price * $item->quantity, 2, ',' , '.' }} (R$ {{ number_format ($item->price. 2, ',' , ',') }})</span>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $order }}
        </div>
    @endforeach
    </div>
</div>
@endsection
