<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/bootstrap.js"></script>
        <title>Lixeira de Categorias</title>

        <script>
            function restore(route){
                if(confirm('Deseja restaurar o categoria ?')){
                    window.location = route;
                }
            }

        </script>
    </head>
            <body class="container mt-5">
        @include('layouts.menu')
        @if(@session()->has('success'))

            <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

        <h1 class="text-center text-uppercase text-muted mb-5">Lixeira de Categorias</h1>
       <div class="row shadow p-3 mb-5 bg-white rounded">
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
                            <form class="d-inline" method="POST" action="{{ route('category.restore', $cat->id) }}" onsubmit="return restore();">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success">Restaurar</button>
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


