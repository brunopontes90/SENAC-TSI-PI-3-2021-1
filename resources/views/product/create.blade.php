<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="/css/bootstrap.css">
        <script src="/js/bootstrap.js"></script>
        <title>Cadastra Categoria</title>
    </head>
    <body>
        <div class="row shadow p-3 m-5 bg-white rounded">
            <h1 class="font-weight-bold text-center text-muted text-uppercase mt-3">Criar Produtos</h1>
            <form method="POST" action="{{route('product.store')}}">
                @method('POST')
                @csrf
                <div class="row">
                    <span class="form-label fs-5 text-uppercase">Nome:</span>
                    <input type="text" name="name" class="form-control" required>
                    <span class="form-label fs-5 text-uppercase mt-3">Preço:</span>
                    <input type="text" name="price" class="form-control" required>
                    <span class="form-label fs-5 text-uppercase mt-3">Descrição:</span>
                    <input type="text" name="desc" class="form-control" required>
                    {{-- <span class="form-label fs-5 text-uppercase mt-3">Opções:</span>
                    <input type="text" name="opcao" class="form-control" required> --}}
                </div>

                <div class="d-flex justify-content-around">
                    <div class="mt-4">
                        <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                    </div>
                    <div class="mt-4">
                        <a href="{{Route('product.index')}}" class="btn btn-dark text-uppercase">Voltar</a>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
