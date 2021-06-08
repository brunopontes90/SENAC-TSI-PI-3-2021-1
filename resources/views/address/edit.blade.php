<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/bootstrap.js"></script>
    <title>Editar endereço</title>
</head>
<body class="container mb-5">
    @include('layouts.menu')

    <h1 class="text-center text-uppercase mt-5 text-muted fw-bold">Editar Endereço</h1>
    <div class="container p-5" style="box-shadow: 0px 5px 10px 0px #000000">
        <form method="POST" action="{{ Route('address.update', $address->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <span class="form-label text-uppercase text-muted fw-bold fs-5">Endereço:</span>
                <input type="text" name="address" class="form-control" value="{{ $address->address }}">
            </div>

            <div class="row">
                <span class="form-label text-uppercase text-muted fw-bold fs-5">CEP:</span>
                <input type="text" name="cep" class="form-control" value="{{ $address->cep }}">
            </div>

            <div class="d-flex justify-content-around">
                <div class="mt-4">
                    <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                </div>
                <div class="mt-4">
                    <a href="{{Route('address.index')}}" class="btn btn-warning text-uppercase">Voltar</a>
                </div>

            </div>
        </form>
    </div>
</body>
</html>
