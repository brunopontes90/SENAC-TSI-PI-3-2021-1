<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/8455a3d02b.js" crossorigin="anonymous"></script>
    <title>Consoles | Coleção</title>

</head>

<body class="container-fluid">
    <header class="fixed-top">
        <!-- LOGO -->
        <nav class="navbar navbar-expand-sm navbar-light text-light bg-dark" id="menu">
            <a class="fas fa-trophy mx-5 text-white h1" href="">
                <h1 class="d-none">Logo</h1>
            </a>
            <!-- COLLAPSE -->
            <button class="navbar-toggler bg-white text-white" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse justify-content-around" id="navbarNav">
                <nav class="d-flex">
                    <p class="mx-5">contato@contato.com</p>
                    <p class="mx-5">(11) 51234-5678</p>
                </nav>

                {{-- VERIFICA SE ESTA LOGADO --}}
                @if (Auth()->user())
                <p class="text-white mx-5">Olá, {{Auth()->user()->name}}</p>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-sign-out-alt text-white"></i>
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
        </nav>
    </header>
</body>


</html>
