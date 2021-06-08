
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8455a3d02b.js" crossorigin="anonymous"></script>
    <title>Loja dos Gamess</title>
    <link rel="icon" href="https://w7.pngwing.com/pngs/959/796/png-transparent-google-play-games-android-play-icon-game-rectangle-logo-thumbnail.png">

    <div class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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

                <form class="d-flex ms-2" action="{{ route('search') }}">
                    @csrf
                    <input class="form-control" type="text" name="search" id="search">
                    <button class="ms-2 btn btn-secondary" style="min-width:95px"><i class="fas fa-search"></i>Buscar</button>
                </form>

                <div class="navbar-nav ms-5">

                    {{-- SE ESTIVER LOGADO, RETORNA NOME, CARRINHO, QTD E LOGOUT --}}
                    @if (Auth()->user())
                    {{-- SAUDAÇÃO COM NOME --}}
                        <span class="nav-link text-white">Olá, {{ Auth()->user()->name}}</span>
                        {{-- LOGO CARRINHO + QTD --}}
                        <a class="nav-link text-white" href="{{ route('cart.show') }}">
                            <i class="fas fa-shopping-cart"></i>
                            ({{\App\Models\Cart::count()}})
                        </a>

                        {{-- FAZ LOGOUT --}}
                        <form class="d-flex" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn text-white"><i class="fas fa-sign-in-alt"></i></button>
                        </form>
                    @endif
                </div>
                </div>
            </div>
        </nav>
    </div>

