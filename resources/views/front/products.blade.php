<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista de Produtos</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="pt-br">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Lista de Produtos</title>

    <script>
        function remover(route){
            if(confirm('Deseja remover o produto?')){
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

    <h1>Lista de produtos</h1>
    <a href="{{Route('front.create')}}" class="btn btn-lg btn-primary">Criar Produto</a>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
               
               {{-- PEGA TODOS OS ELEMENTOS DO BANCO --}}
                @foreach ($product as $prod)
                    <tr>
                        <td>{{ $prod->id }}</td>
                        <td>{{ $prod->name }}</td>
                        <td>{{ $prod->price }}</td>
                        <td>{{ $prod->desc }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-success">Visualizar</a>
                            <a href="{{ Route('front.edit',$prod->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <a href="#" onclick="remover('{{ route('front.destroy', $prod->id) }}');" class="btn btn-sm btn-danger">Apagar</a>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>


</body>
</html>
</body>
</html>