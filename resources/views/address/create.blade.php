<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/bootstrap.js"></script>
        <title>Cadastrar endereço</title>
    </head>
    <body class="container">
        @include('layouts.menu')

        <h1 class="mt-5 text-center text-muted text-uppercase fw-bold">Novo endereço</h1>

        <div class="row p-3 mt-2 mx-1" style="box-shadow: 0px 5px 10px 0px #6E6E6E">
            <form method="POST" action="{{route('address.store')}}">
                @csrf
                <div class="row">
                    <span class="form-label fs-5 text-uppercase">Endereço:</span>
                    <input type="text" name="address" class="form-control" placeholder="Endereço" required>
                </div>

                <div class="row">
                    <span class="form-label fs-5 text-uppercase">Cep:</span>
                    <input type="text" name="cep" class="form-control" placeholder="CEP" required>
                </div>

                <div class="d-flex justify-content-around">
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success btn-lg text-uppercase">Salvar</button>
                    </div>
                    <div class="mt-4">
                        <a href="{{Route('address.index')}}" class="btn btn-warning btn-lg text-uppercase">Voltar</a>
                    </div>
                </div>

            </form>
        </div>

    </body>
</html>
