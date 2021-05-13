<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Editar Produto</title>
</head>
<body>
    @include('layouts.menu')
    <div class="container mt-5" class="row shadow p-3 mb-5 bg-white rounded">
    <h1>Edita produto</h1>
        <form method="POST" action="{{ Route('product.update', $product->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <span class="form-label text-uppercase fs-5">Nome:</span>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="row">
                <span class="form-label text-uppercase fs-5">Preço:</span>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="row">
                <span class="form-label text-uppercase fs-5">Descrição</span>
                <input type="text" name="desc" class="form-control" value="{{ $product->desc }}">
            </div>

            <div class="row">
            <span class="form-label fs-5 text-uppercase">Categoria:</span>
                <select class="form-select" name="category_id">
                    @foreach($categories as $category)

                        <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>{{$category->name}}</option>

                    @endforeach
                </select>
            </div>


            <div class='row'>
            <span class="form-label fs-5 text-uppercase">Tags:</span>
            <select class="form-select" name="tags[]" multiple>
                @foreach($tags as $tag)

                    <option value="{{$tag->id}}" @if($product->tags->contains($tag->id))selected @endif>{{$tag->name}}</option>

                @endforeach
            </select>
            </div>

            <div class="row">
                <span class="form-label fs-5 text-uppercase mt-3">Imagem:</span>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="d-flex justify-content-around">
                <div class="mt-4">
                    <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                </div>
                <div class="mt-4">
                    <a href="{{Route('product.index')}}" class="btn btn-dark text-uppercase">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
