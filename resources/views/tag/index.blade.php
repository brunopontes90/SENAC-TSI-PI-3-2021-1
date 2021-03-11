<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <title>Lista de Tags</title>

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

        <h1 class="text-uppercase text-muted text-center">Lista de tags</h1>

        <div class="row shadow p-3 mb-5 bg-white rounded">
            <div class="d-flex justify-content-end mt-2">
                <a href="{{Route('tag.create')}}" class="btn btn-lg btn-primary text-uppercase">Criar Tag</a>
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
                                    <a href="{{ Route('tag.edit',$prod->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form method="POST" action="{{ route('tag.destroy', $tag->id) }}" onsubmit="return();">
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
