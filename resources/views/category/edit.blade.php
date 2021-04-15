<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Editar Categoria</title>
</head>
<body class="container mt-5">
    @include('layouts.menu')

    <h1 class="text-center text-uppercase text-muted">Editar Categoria</h1>
    <div class="row shadow p-3 mb-5 bg-white rounded">
        <form method="POST" action="{{ Route('category.update', $category->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <span class="form-label text-uppercase fs-5">Nome:</span>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>

            <div class="d-flex justify-content-around">
                <div class="mt-4">
                    <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                </div>
                <div class="mt-4">
                    <a href="{{Route('category.index')}}" class="btn btn-dark text-uppercase">Voltar</a>
                </div>

            </div>
        </form>
    </div>
</body>
</html>
