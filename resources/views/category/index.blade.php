<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <title>Lista de Categorias</title>

        <script>
            function remover(route){
                if(confirm('Deseja remover a categoruia?')){
                    window.location = route;
                }
            }
        </script>
    </head>
    <body class="container mt-5">
        @if(@session()->has('success'))

            <div class="alert alert-success text-center" role="alert">
                {{ session()->get('success') }}
            </div>

        @endif

        <h1 class="text-center text-uppercase text-muted mb-5">Lista de categorias</h1>
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
                        <td>{{$cat->name}}</td>
                        <td class="text-uppercase">
                            <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="{{route('category.edit',$cat->id)}}" class="btn btn-sm btn-warning">Editar</a>
                            <a href="#" onclick="remover('{{route('category.destroy', $cat->id)}}');" class="btn btn-sm btn-danger">Apagar</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
       </div>

    </body>
</html>
