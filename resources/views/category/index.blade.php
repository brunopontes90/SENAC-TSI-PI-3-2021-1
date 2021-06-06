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
    <body class="container mb-5">
        @include('layouts.menu')
        @if(@session()->has('success'))

            <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

       <h1 class="text-uppercase text-center fw-bold mt-5">Lista de Categorias</h1>

       <div class="row p-3 mb-5 rounded" style="box-shadow: 0px 5px 10px 0px #000000">
        <div class="d-flex justify-content-end mt-2">
            <a href="{{route('category.create')}}" class="btn btn-lg btn-primary text-uppercase fw-bold" style="box-shadow: 2px 1px 1px 0px #BDBDBD">Criar Categoria</a>
        </div>

        <div class="row mt-3">
            <table class="table table-striped">
                <thead>
                    <tr class="text-uppercase text-muted fw-bold">
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $cat)
                        <tr>
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
