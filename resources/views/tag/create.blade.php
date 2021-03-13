<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <title>Cadastra Categoria</title>
    </head>
    <body>
        <h1 class="text-center text-muted text-uppercase mt-3">Criar Tag</h1>

        <div class="row shadow p-3 mb-5 bg-white rounded">
            <form method="POST" action="{{route('tag.store')}}">
                @csrf
                <div class="row">
                    <span class="form-label fs-5 text-uppercase">Nome:</span>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="row mt-4">
                    <button type="submit" class="btn btn-success text-uppercase">Salvar</button>
                </div>

            </form>
        </div>
    </body>
</html>
