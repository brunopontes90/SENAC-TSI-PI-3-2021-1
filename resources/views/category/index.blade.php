<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <script src="./js/bootstrap.js"></script>
        <title>Categorias</title>

        <script>
            function remover(route){
                if(confirm('Deseja remover a categoruia?')){
                    window.location = route;
                }
            }

        alert('0000000000000');
        </script>
    </head>
    <body class="container mt-5">
        @include('layouts.menu')
        @if(@session()->has('success'))

            <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

        <h1 class="text-center text-uppercase text-muted mb-5">Categorias</h1>
       <div class="row shadow p-3 mb-5 bg-white rounded">
        <div class="d-flex justify-content-end">
            <a href="{{route('category.create')}}" class="btn btn-lg btn-primary mb-4 text-uppercase">Criar Categoria</a>
        </div>

        <div>
            <table class="table table-striped">
                <thead>
                    <tr class="text-uppercase">
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
                            <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="{{route('category.edit',$cat->id)}}" class="btn btn-sm btn-warning">Editar</a>
                            <form class="d-inline" method="POST" action="{{ route('category.destroy', $cat->id) }}" onsubmit="return remover();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
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
