@extends('layouts.store')
@section('content')
<h2>Pagamentos</h2>
<div class="row justify-content-center">
    <div class="col-md-5 col-10 my-4 p-3">
        <h3>Endereço de Entrega</h3>
        <address class="ms-3">


        </address>
        <a href="#" class="float-end me-4">Trocar o endereço</a>
    </div>
    <div class="col-md-5 col-10 bg-light my-4 p-3">
        <h3>Resumo da compra</h3>
        <div class="ms-3">
            <div>
                <span>Quantidade de produtos comprados</span>
                <a href="{{ route('cart.show') }}" class="float-end me-4">{{ \App\Models\Cart::count() }} produto(s)</a>
            </div>
            <div>
                <span>Frete:</span>
                <span class="float-end me-4 text-success fw-bold">Gratis</span>
            </div>
            <hr>
            <div>
                <span class="h4">Total a pagar:</span>
                <span class="float-end me-4 h4"> R$ {{ number_format (\App\Models\Cart::totalValue(), 2, ',' , '.') }}</span>
            </div>
        </div>
    </div>
</div>
<hr>
<form style="margin-top: 25px; margin-bottom: 70px;" method="POST" action="{{ route('order.add') }}">
    <h2>Dados pagamento</h2>
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-5 col-10 p-3">
            <label for="cc-nome">Nome no cartão</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                <input type="text" id="cc-nome" name="cc-nome" class="form-control" require>
            </div>
            <small class="text-muted">Deve preencher igual ao cartão</small>
        </div>
        <div class="col-md-5 col-10 p-3">
            <label for="cc_number">Numero do cartão</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                <input type="text" id="cc_number" name="cc_number" class="form-control" require>
            </div>
        </div>
    </div>
        <div class="row justify-content-center">
        <div class="col-md-5 col-10 p-3">
            <label for="cc-nome">Codigo CVV</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                <input type="text" id="cc-cvv" name="cc-cvv" class="form-control" require>
            </div>
        </div>
        <div class="col-md-5 col-10 p-3">
            <label for="cc-nome">Data de validade</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                <input type="text" id="cc-date" name="cc-date" class="form-control" require>
            </div>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-lg btn-success float-end">Pagar</button>
    </div>
</form>
@endsection
