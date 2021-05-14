<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
        <title>Lista de Produtos</title>

        <script>
            function remover(route){
                if(confirm('Deseja remover o produto ?')){
                    window.location = route;
                }
            }
        </script>
    </head>
    <body class="container bg-secondary mb-5">
        @include('layouts.menu')
        <main class="container mt-5">

            @if(@session()->has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            <h1 class="text-uppercase text-center text-white fw-bold">Lista de produtos</h1>

            <div class="row p-3 mb-5 bg-dark rounded" style="box-shadow: 2px 3px 3px 0px #FFFFFF">
                <div class="d-flex justify-content-end mt-2">
                    <a href="{{route('product.create')}}" class="btn btn-lg btn-primary text-uppercase fw-bold" style="box-shadow: 2px 1px 1px 0px #FFFFFF">Criar Produto</a>
                </div>

                <div class="row mt-3">
                    <table class="table table-striped text-white">
                        <thead>
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th>Categoria</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>

                        {{-- PEGA TODOS OS ELEMENTOS DO BANCO --}}
                            @foreach ($products as $prod)
                                <tr class="text-white">
                                    <td>{{ $prod->id }}</td>
                                    <td><img src ="{{ asset($prod->image) }}" style="width:70px"></td>
                                    <td>{{ $prod->name }}</td>
                                    <td>{{ $prod->price }}</td>
                                    <td>{{ $prod->desc }}</td>
                                    <td>{{ $prod->category->name }}</td>
                                    <td>
                                        <a href="{{route('product.show', $prod->id)}}" class="btn btn-sm btn-success mx-1">Visualizar</a>
                                        <a href="{{ Route('product.edit',$prod->id) }}" class="btn btn-sm btn-warning mx-1">Editar</a>
                                        <form class="d-inline" method="POST" action="{{ route('product.destroy', $prod->id) }}" onsubmit="return remover();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mx-1">Apagar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </main>

    </body>
</html>
