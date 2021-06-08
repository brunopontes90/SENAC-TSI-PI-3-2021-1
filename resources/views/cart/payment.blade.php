@extends('layouts.store')
@section('content')
<style>
    #inputCEP{
        width: 120px;
        height: 30px;
    }
</style>
<h2 class="text-uppercase fw-bold mt-5">Pagamentos</h2>
<div class="row p-3 rounded" style="box-shadow: 0px 5px 10px 0px #000000">
    <div class="row mt-3 justify-content-center">
        <div class="col-md-5 col-10 my-4 p-3">
            <h3>Endereço de Entrega</h3>


            <form method="POST" class="d-flex">
                @csrf
                <address class="ms-3">
                    <div class="form-group col-md-2">
                        <label for="inputCEP">CEP</label>
                        <input type="number" class="form-control" id="inputCEP" placeholder="00000-000" required>
                    </div>
                </address>
                <a href="#" class="float-end my-4 mx-3">Trocar o endereço</a>
            </form>




            {{-- <address class="ms-3">


            </address>
            <a href="#" class="float-end me-4">Trocar o endereço</a> --}}
        </div>
        <div class="col-md-5 col-10 bg-light my-4 p-3">
            <h3>Resumo da Compra</h3>
            <div class="ms-3">
                <div>
                    <span class="text-muted fw-bold">Quantidade de produtos comprados</span>
                    <a href="{{ route('cart.show') }}" class="float-end me-4">{{ \App\Models\Cart::count() }} produto(s)</a>
                </div>
                <div>
                    <span class="text-muted fw-bold">Frete:</span>
                    <span class="float-end me-4 text-success fw-bold">Grátis</span>
                </div>
                <hr>
                <div>
                    <span class="h4 fw-bold">Total a Pagar:</span>
                    <span class="float-end me-4 h4"> R$ {{ number_format (\App\Models\Cart::totalValue(), 2, ',' , '.') }}</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <form style="margin-top: 25px; margin-bottom: 70px;" method="POST" action="{{ route('order.add') }}">
        <h2 class="text-uppercase fw-bold mt-5">Dados pagamento</h2>
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-5 col-10 p-3">
                <label for="cc-nome" class="fw-bold text-muted">Nome do Cartão</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                    <input type="text" id="cc-nome" name="cc-nome" class="form-control text-center" placeholder="Nome do Cartão" required>
                </div>
                <small class="text-muted">Deve preencher igual ao cartão</small>
            </div>
            <div class="col-md-5 col-10 p-3">
                <label for="cc_number" class="fw-bold text-muted">Número do Cartão</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                    <input type="number" id="cc_number" name="cc_number" class="form-control text-center" placeholder="Número do Cartão" required>
                </div>
            </div>
        </div>
            <div class="row justify-content-center">
            <div class="col-md-5 col-10 p-3">
                <label for="cc_number" class="fw-bold text-muted">Código CVV</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                    <input type="number" id="cc-cvv" name="cc-cvv" class="form-control text-center" placeholder="Código do Cartão" required>
                </div>
            </div>
            <div class="col-md-5 col-10 p-3">
                <label for="cc-nome" class="fw-bold text-muted">Data de Validade</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    <input type="date" id="cc-date" name="cc-date" class="form-control text-center" placeholder="Data do Cartão" required>
                </div>
            </div>
        </div>
        <div class="row mb-0">
            <button type="submit" class="btn btn-lg btn-success float-end">Pagar</button>
        </div>
    </form>
</div>
@endsection
