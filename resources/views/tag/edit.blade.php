<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tag</title>
</head>
<body>
    <div class="row shadow p-3 mb-5 bg-white rounded">
        <form method="POST" action="{{ Route('tag.update', $tag->id) }}">
            @method('PATCH')
            @csrf
            <div class="row">
                <span class="form-label text-uppercase fs-5">Nome:</span>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="d-flex justify-content-around">
                <div class="mt-4">
                    <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                </div>
                <div class="mt-4">
                    <a href="{{Route('tag.index')}}" class="btn btn-dark text-uppercase">Voltar</a>
                </div>

        </form>
    </div>
</body>
</html>
