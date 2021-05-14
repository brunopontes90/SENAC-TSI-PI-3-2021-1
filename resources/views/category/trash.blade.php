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
    <body class="container bg-secondary">
        @include('layouts.menu')
        @if(@session()->has('success'))

            <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

        <h1 class="text-uppercase text-center fw-bold text-white mt-5">Lixeira de Categorias</h1>
       <div class="row mt-3 p-5 bg-dark" style="box-shadow: 2px 3px 3px 0px #FFFFFF">

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
                        <td>
                            <form class="d-inline" method="POST" action="{{ route('category.restore', $cat->id) }}" onsubmit="return restore();">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success fw-bold text-uppercase">Restaurar</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

       </div>

    </body>
</html>


