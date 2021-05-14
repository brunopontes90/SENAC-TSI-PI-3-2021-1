<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <script src="./js/bootstrap.js"></script>

        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/bootstrap.js"></script>
        <title>Lixeira de Tags</title>

        <script>
            function restore(route){
                if(confirm('Deseja restaurar a tag?')){
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

        <h1 class="text-uppercase text-center fw-bold text-white mt-5">Lixeira de Tags</h1>

        <div class="row mt-3 p-5 bg-dark" style="box-shadow: 2px 3px 3px 0px #FFFFFF">

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

                    {{-- PEGA TODOS OS ELEMENTOS DO BANCO --}}
                        @foreach ($tags as $tag)
                            <tr class="text-white">
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <form class="d-inline" method="POST" action="{{ route('tag.restore', $tag->id) }}" onsubmit="return restore();">
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
