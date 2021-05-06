<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <title>Consoles | Coleção</title>
</head>
<body>
    <header>
        <nav class="d-flex justify-content-center nav navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.index') }}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tag.index') }}">Tags</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product.trash') }}">Lixeira</a>
                </li>
            </ul>
        </nav>
    </header>

</body>
</html>
