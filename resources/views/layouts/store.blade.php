    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8455a3d02b.js" crossoringin="anonymous"></script>
    <title>Loja dos Gamess</title>
    <link rel="icon" href="https://w7.pngwing.com/pngs/959/796/png-transparent-google-play-games-android-play-icon-game-rectangle-logo-thumbnail.png">
    @yield('css')

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
              <h1><a class="navbar-brand" href="{{url('/')}}">Loja dos Games</a></h1>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              {{-- LINKS PARA CATEGORIAS --}}
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    {{-- LINKS PARA CATEGORIAS --}}
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCategoria" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categoria</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategoria">
                      @foreach (\App\Models\Category::all() as $category)
                        <li>
                            <a class="dropdown-item" href="{{ route('category.show', $category->id)}}">{{$category->name}}</a>
                        </li>
                      @endforeach
                    </ul>
                  </li>

                  {{-- LINKS PARA TAGS --}}
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuTag" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tags</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuTag">
                      @foreach (\App\Models\Tag::all() as $tag)
                        <li>
                            <a class="dropdown-item" href="{{ route('tag.show', $tag->id)}}">{{$tag->name}}</a>
                        </li>
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

                <div class="navbar-nav ms-auto">
                    {{-- SE ESTIVER LOGADO, RETORNA NOME, CARRINHO, QTD E LOGOUT --}}
                    @if (Auth()->user())
                    {{-- SAUDAÇÃO COM NOME --}}
                        <span class="nav-link">Olá, {{ Auth()->user()->name}}</span>
                        {{-- LOGO CARRINHO + QTD --}}
                        <a class="nav-link" href="{{ route('cart.show') }}">
                            <i class="fas fa-shopping-cart"></i>
                            ({{\App\Models\Cart::count()}})
                        </a>

                        {{-- FAZ LOGOUT --}}
                        <form class="d-flex mb-0" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn text-secondary">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    @else
                        {{-- SE NÃO TIVER LOGADO, OPÇÃO DE REGISTRAR OU LOGAR --}}
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fas fa-user-plus"></i>
                        </a>
                        {{-- ICON LOGIN --}}
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-user"></i>
                        </a>
                    @endif
                </div>
              </div>
            </div>
          </nav>


    <div class="container my-4 text-center">

        @if(@session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
        @endif

        @if(@session()->has('error'))
            <div class="alert alert-danger" role="alert">{{ session()->get('error') }}</div>
        @endif
        @yield('content')
    </div>

    <div class="container-fluid bg-primary text-center text-white">
        <div class="row">
            <div class="col-6">
                <h2 class="h4 text-uppercase fw-bold mt-2">Localização:</h2>
                <address>
                    Av. Eng. Eusébio Stevaux, 823<br>
                    São Paulo - SP<br>
                    CEP: 04696-000<br>
                    Telefone: (11) 5682-7300<br>
                </address>
            </div>
            <div class="col-6">
                <h3 class="h4 text-uppercase fw-bold mt-2">Horario de Funcionamento</h3>
                <ul class="list-unstyled">
                    <li>Segunda - Sexta: 8:00h as 17:00h</li>
                    <li>Sabado: 10:00h as 16:00h</li>
                </ul>
            </div>
        </div>
    </div>
