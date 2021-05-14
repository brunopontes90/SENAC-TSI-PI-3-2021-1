<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Consoles | Coleção</title>
</head>
<body>
    <header class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav text-uppercase fw-bold">
                    <li class="nav-item">
                    <a class="nav-link text-warning" aria-current="page" href="{{ route('product.index') }}">Produtos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('category.index') }}">Categorias</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('tag.index') }}">Tags</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lixeira
                    </a>
                    <ul class="dropdown-menu text-center bg-dark" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item fw-bold text-white" href="{{route('product.trash')}}">Produtos</a></li>
                        <li><a class="dropdown-item fw-bold text-white" href="{{route('category.trash')}}">Categorias</a></li>
                        <li><a class="dropdown-item fw-bold text-white" href="{{route('tag.trash')}}">Tags</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

</body>
</html>
