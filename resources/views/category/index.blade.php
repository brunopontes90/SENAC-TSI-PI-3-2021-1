<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <script src="./js/bootstrap.js"></script>
        <title>Categorias</title>
        <script>
            function remover(route){
                if(confirm('Deseja remover a categoria?')){
                    window.location = route;
                }
            }

        </script>
    </head>
    <body class="container bg-secondary mb-5">
        @include('layouts.menu')
        @if(@session()->has('success'))

            <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

       <h1 class="text-uppercase text-center text-white fw-bold mt-5">Lista de Categorias</h1>

       <div class="row p-3 mb-5 bg-dark rounded" style="box-shadow: 2px 3px 3px 0px #FFFFFF">
        <div class="d-flex justify-content-end mt-2">
            <a href="{{route('category.create')}}" class="btn btn-lg btn-primary text-uppercase fw-bold" style="box-shadow: 2px 1px 1px 0px #FFFFFF">Criar Categoria</a>
        </div>

        <div class="row mt-3">
            <table class="table table-striped text-white">
                <thead>
                    <tr class="text-uppercase">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cat)
                        <tr class="text-white">
                            <td>{{$cat->id}}</td>
                        <td>{{$cat->name}} ({{ $cat->products->count() }})</td>
                        <td class="text-uppercase">
                            <a href="#" class="btn btn-sm btn-success mx-1">Visualizar</a>
                            <a href="{{route('category.edit',$cat->id)}}" class="btn btn-sm btn-warning mx-1">Editar</a>
                            <form class="d-inline" method="POST" action="{{ route('category.destroy', $cat->id) }}" onsubmit="return remover();">
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

    </body>
</html>
