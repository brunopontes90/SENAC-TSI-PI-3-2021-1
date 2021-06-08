<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <script src="./js/bootstrap.js"></script>
        <title>lista de endereço</title>
        <script>
            function remover(route){
                if(confirm('Deseja remover a endereço?')){
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

       <h1 class="text-uppercase text-center fw-bold text-muted mt-5">Lista de endereços</h1>

       <div class="row p-3 mb-5 rounded" style="box-shadow: 0px 5px 10px 0px #000000">
        <div class="d-flex justify-content-end mt-2">
            <a href="{{route('address.create')}}" class="btn btn-lg btn-primary text-uppercase fw-bold" style="box-shadow: 2px 1px 1px 0px #BDBDBD">Novo enderço</a>
        </div>

        <div class="row mt-3">
            <table class="table table-striped">
                <thead>
                    <tr class="text-uppercase text-muted fw-bold">
                        <th>ID</th>
                        <th>Endereço</th>
                        <th>CEP</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($address as $add)
                        <tr>
                            <td> {{ $add->id }} </td>
                            <td> {{ $add->address }} </td>
                            <td> {{ $add->cep }} </td>
                            <td class="text-uppercase">
                                <a href="#" class="btn btn-sm btn-success mx-1">Visualizar</a>
                                <a href="{{route('address.edit',$add->id)}}" class="btn btn-sm btn-warning mx-1">Editar</a>
                                <form class="d-inline" method="POST" action="{{ route('address.destroy', $add->id) }}" onsubmit="return remover();">
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
