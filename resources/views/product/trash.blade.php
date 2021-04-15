<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/bootstrap.js"></script>
        <title>Lixeira de Produtos</title>

        <script>
            function restore(route){
                if(confirm('Deseja restaurar o produto?')){
                    window.location = route;
                }
            }
        </script>
    </head>
    <body class="container-fluid">

        @include('layouts.menu')
        <main class="container mt-5">

            @if(@session()->has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session()->get('success') }}
                </div>
            @endif

            <h1 class="text-uppercase text-muted text-center">Lixeira de produtos</h1>

                <div class="row mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-uppercase">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Descrição</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>

                        {{-- PEGA TODOS OS ELEMENTOS DO BANCO --}}
                            @foreach ($products as $prod)
                                <tr>
                                    <td>{{ $prod->id }}</td>
                                    <td>{{ $prod->name }}</td>
                                    <td>{{ $prod->price }}</td>
                                    <td>{{ $prod->desc }}</td>
                                    <td>
                                        <form class="d-inline" method="POST" action="{{ route('product.restore', $prod->id) }}" onsubmit="return restore();">
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
    </main>

    </body>
</html>
