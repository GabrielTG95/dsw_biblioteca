<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca</title>
    <!-- Fuente para añadir Font Awesome -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark info-color">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{url('/libros')}}">Biblioteca</a>
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">
        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/libros') }}"><i class="fa fa-book"></i> Libros
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            @isset(Auth::user()->rol)
                @if(Auth::user()->rol == 0)
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/users') }}"><i class="fa fa-users"></i> Usuarios
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/prestamos') }}"><i class="fa fa-bookmark"></i> Prestamos
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/prestamos') }}"><i class="fa fa-bookmark"></i> Mis Prestamos
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
            @endif
        @endisset
        </ul>
        <!-- Links -->
    </div>
    <!-- Collapsible content -->
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-white underline"><i class="fa fa-user-circle"></i> Mi
                    Perfil</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-white underline">Iniciar Sesión</a>
            |
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm text-white underline">Registrarme</a>
                @endif
            @endauth
        </div>
    @endif
</nav>
<!--/.Navbar-->
<div class="container">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
</body>
</html>
