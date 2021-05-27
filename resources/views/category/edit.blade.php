<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
    <title>Editar Categoria</title>
</head>
<body class="container bg-secondary mb-5">
    @include('layouts.menu')

    <h1 class="text-center text-uppercase mt-5 text-white fw-bold">Editar Categoria</h1>
    <div class="container bg-dark p-5" style="box-shadow: 2px 3px 3px 0px #FFFFFF">
        <form method="POST" action="{{ Route('category.update', $category->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <span class="form-label text-uppercase fs-5 text-white">Nome:</span>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
            </div>

            <div class="d-flex justify-content-around">
                <div class="mt-4">
                    <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                </div>
                <div class="mt-4">
                    <a href="{{Route('category.index')}}" class="btn btn-warning text-uppercase">Voltar</a>
                </div>

            </div>
        </form>
    </div>
</body>
</html>
