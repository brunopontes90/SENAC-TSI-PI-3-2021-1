<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <script src="./js/bootstrap.js"></script>
        <title>Lixeira de Tags</title>

        <script>
            function remover(){
                return confirm('Deseja remover a Tag?');
            }
        </script>
    </head>
    <body class="container mt-5">
        @if(@session()->has('success'))

            <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

        <h1 class="text-uppercase text-muted text-center">Lixeira de Tags</h1>

        <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="d-flex justify-content-end mt-2">
                <a href="{{route('tag.create')}}" class="btn btn-lg btn-primary text-uppercase">Criar Tag</a>
            </div>

            <div class="row mt-3">
                <table class="table table-striped">
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
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                                    <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form class="d-inline" method="POST" action="{{ route('tag.destroy', $tag->id) }}" onsubmit="return();">
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
