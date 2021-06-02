<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/bootstrap.js"></script>
        <title>Cadastra Categoria</title>
    </head>
    <body class="container bg-secondary mb-5">
        @include('layouts.menu')
        <div class="row p-3 mt-5 mx-1 bg-dark" style="box-shadow: 2px 3px 3px 0px #FFFFFF">
            <h1 class="text-center text-uppercase text-white fw-bold">Criar Produtos</h1>
            <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="row text-white">
                    <span class="form-label fs-5 text-uppercase">Nome:</span>
                    <input type="text" name="name" class="form-control" required placeholder="Nome Completos">
                    <span class="form-label fs-5 text-uppercase mt-3">Preço:</span>
                    <input type="text" name="price" class="form-control" required placeholder="R$ 0.00">
                    <span class="form-label fs-5 text-uppercase mt-3">Descrição:</span>
                    <input type="text" name="desc" class="form-control" required placeholder="Descrição do Produto">
                    <span class="form-label fs-5 text-uppercase">Categoria:</span>
                    <select class="form-select" name="category_id">
                        @foreach($categories as $category)

                        <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                    </select>

                    <span class="form-label fs-5 text-uppercase">Tags:</span>
                    <select class="form-select" name="tags[]" multiple>
                        @foreach($tags as $tag)

                        <option value="{{$tag->id}}">{{$tag->name}}</option>

                        @endforeach
                    </select>

                    <span class="form-label fs-5 text-uppercase mt-3">Imagem:</span>
                    <input type="file" name="image" class="form-control">

                    {{-- <span class="form-label fs-5 text-uppercase mt-3">Opções:</span>
                    <input type="text" name="opcao" class="form-control" required> --}}
                </div>

                <div class="d-flex justify-content-around">
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                    </div>
                    <div class="mt-4">
                        <a href="{{Route('product.index')}}" class="btn btn-warning text-uppercase">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
