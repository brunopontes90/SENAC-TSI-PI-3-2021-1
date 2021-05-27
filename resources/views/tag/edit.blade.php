<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Editar Tag</title>
</head>
<body class="container bg-secondary mt-5">
    @include('layouts.menu')
    <h1 class="text-center text-uppercase mt-5 text-white fw-bold">Editar tag</h1>
    <div class="container bg-dark p-5" style="box-shadow: 2px 3px 3px 0px #FFFFFF">
        <form method="POST" action="{{ Route('tag.update', $tag->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <span class="form-label text-uppercase fs-5">Nome:</span>
                <input type="text" name="name" class="form-control" value="{{ $tag->name }}">
            </div>

            <div class="d-flex justify-content-around">
                <div class="mt-4">
                    <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                </div>
                <div class="mt-4">
                    <a href="{{Route('tag.index')}}" class="btn btn-warning text-uppercase">Voltar</a>
                </div>

        </form>
    </div>
</body>
</html>
