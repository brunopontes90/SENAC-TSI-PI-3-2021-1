<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

   <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/8455a3d02b.js" crossoringin="anonymous"></script>
    @yield('css')
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
            <div class="container">
              <h1><a class="navbar-brand" href="{{url('/')}}">Loja do Games</a></h1>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCategoria" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categoria</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategoria">
                      @foreach (\App\Models\Category::all() as $category)
                        <li><a class="dropdown-item" href="{{ route('category.show', $category->id)}}">{{$category->name}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuTag" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tags</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuTag">
                      @foreach (\App\Models\Tag::all() as $tag)
                        <li><a class="dropdown-item" href="{{ route('tag.show', $tag->id)}}">{{$tag->name}}</a></li>
                      @endforeach
                    </ul>
                  </li>
                </ul>


                {{-- EDITAR O MENU DE BUSCA --}}
                <form class="d-flex ms-2" action="{{ route('search') }}">
                    @csrf
                    <input class="form-control" type="text" name="search" id="search">
                    <button class="ms-2 btn btn-secondary" style="min-width:95px"><i class="fas fa-search"></i>Buscar</button>
                </form>


                <!--
                {{--
                <div class="navbar-nav ">
                    @if (Auth()->user())
                        <span class="nav-link">{{ Auth()->user()->name}}</span>
                        <a class="nav-link" href="{{ route('cart.show') }}">Carrinho ({{  \App\Models\Cart::count() }})</a>
                    @else
                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                        <a class="nav-link" href="{{ route('login') }}">Logar</a>
                    @endif
                </div>
                --}}



                <div class="navbar-nav ms-auto">

                    {{-- SE ESTIVER LOGADO, RETORNA NOME, CARRINHO, QTD E LOGOUT --}}
                    @if (Auth()->user())
                    {{-- SAUDAÇÃO COM NOME --}}
                        <span class="nav-link text-BLACK">Olá, {{ Auth()->user()->name}}</span>
                        {{-- LOGO CARRINHO + QTD --}}
                        <a class="nav-link text-white" href="{{ route('cart.show') }}">
                            <i class="fas fa-shopping-cart"></i>
                            ({{\App\Models\Cart::count()}})
                        </a>

                        {{-- FAZ LOGOUT --}}
                        <form class="d-flex" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn"><i class="fas fa-sign-in-alt text-white"></i>
                            <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    @else
                        {{-- SE NÃO TIVER LOGADO, OPÇÃO DE REGISTRAR OU LOGAR --}}
                        <a class="nav-link text-white" href="{{ route('register') }}">Registrar</a>
                        <a class="nav-link text-white" href="{{ route('login') }}"><i class="fas fa-user"></i></a>
                    @endif
                    -->

                <div class="navbar-nav ms-auto">
                @if (Auth()->user())
                    <span class="nav-link">Olá, {{Auth()->user()->name}}</span>
                    <a class="nav-link" href="{{ route('cart.show') }}">Carrinho ({{  \App\Models\Cart::count() }})</a>
                    <form method="POST" action="{{route('logout')}}">
                     @csrf
                        <button type="submit" class="btn btn-primary bg-dark text-white">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                @else
                {{-- BOTAO LOGIN --}}
                    <nav class="justify-content-end">
                        <a class="fas fa-user text-white" href="{{route('login')}}">
                            <h2 class="d-none">Login</h2>
                        </a>
                    </nav>
                @endif
                </div>



                </div>
              </div>
            </div>
          </nav>
        </header>

    <main class="container my-4 text-center">

        @if(@session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
        @endif

        @if(@session()->has('error'))
            <div class="alert alert-danger" role="alert">{{ session()->get('error') }}</div>
        @endif
        @yield('content')
    </main>

    <footer class="container bg-primary text-white p-5">
        <div class="row">
            <div class="col-6">
                <h2>Localização:</h2>
                <address>
                    Rua Lorem, ipsum dolor.<br>
                    Lorem, ipsum. Lorem, LR<br>
                    CEP: 00000-000<br>
                    Telefone: (11) 99999-99998
                </address>
            </div>
            <div class="col-6">
                <h2>Horario de Funcionamento</h2>
                <ul class="list-unstyled">
                    <li>Segunda - Sexta: 9:00h as 18:00h</li>
                    <li>Sabado: 10:00h as 16:00h</li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>
