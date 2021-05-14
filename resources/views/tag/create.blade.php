<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/bootstrap.js"></script>
        <title>Cadastra Categoria</title>
    </head>
    <body class="container bg-secondary">
        @include('layouts.menu')

        <h1 class="mt-5 text-center text-uppercase text-white fw-bold">Criar Tag</h1>

        <div class="row p-3 mx-1 bg-dark" style="box-shadow: 2px 3px 3px 0px #FFFFFF">
            <form method="POST" action="{{route('tag.store')}}">
                @csrf
                <div class="row">
                    <span class="form-label fs-5 text-uppercase text-white">Nome:</span>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="d-flex justify-content-around">
                    <div class="row mt-4">
                        <button type="submit" class="btn btn-success btn-lg text-uppercase">Salvar</button>
                    </div>
                    <div class="mt-4">
                        <a href="{{Route('tag.index')}}" class="btn btn-warning btn-lg text-uppercase">Voltar</a>
                    </div>
                </div>

            </form>
        </div>
    </body>
</html>
