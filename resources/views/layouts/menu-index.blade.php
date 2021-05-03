<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <title>Consoles | Coleção</title>

</head>


<body class="container-fluid">
    <header class="fixed-top">
        <!-- LOGO -->
        <nav class="navbar navbar-expand-sm navbar-light text-light bg-dark" id="menu">
            <a class="fas fa-trophy m-2 text-white h1" href="">
                <h1 class="d-none">Logo</h1>
            </a>
            <!-- COLLAPSE -->
            <button class="navbar-toggler bg-white text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
                <nav class="d-flex">
                    <p class="mr-5">contato@contato.com</p>
                    <p class="mr-5">(11) 51234-5678</p>
                </nav>
                <!-- LOGIN -->
                <nav class="justify-content-end">
                    <a class="text-white fas fa-user" href="#">
                        <h2 class="d-none">Login</h2>
                    </a>
                </nav>
            </div>
        </nav>

        <!-- <nav class="d-flex justify-content-around nav navbar-expand-sm navbar-light bg-light">
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
        </nav> -->
        <!-- CONSOLES -->
        <nav class="d-flex justify-content-around bg-light mt-0 p-3 h3">
            <a class="fab fa-xbox text-success" href="#">Xbox</a>
            <a class="fab fa-playstation text-dark" href="#">Playstation</a>
            <a class="fas fa-gamepad text-danger" href="#">Switch</a>
        </nav>
    </header>
</body>


</html>
