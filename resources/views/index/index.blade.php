<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('icons/favicon.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <title>Filmo</title>
</head>

<body>

    <div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <a href="home" class="navbar"><img id="icono-filmo" src='https://i.postimg.cc/WpyD0S0N/Filmo.png'
                        alt='Screenshot-2025-03-11-at-19-02-06-Landing-Page-Landing-Celem-n' /></a>

                <ul class="paginas-nav">
                    <li><a id="len1" class="hoverable" href="{{ route('home') }}">Inicio</a></li>
                    <li><a id="len2" class="hoverable" href="{{ route('cartelera') }}">Cartelera</a></li>
                    <li><a id="len3" class="hoverable" href="{{ route('catalogo') }}">Catalogo</a></li>
                    <li><a id="len4" class="hoverable" href="{{ route('cine') }}">Cines</a></li>
                    @if (Auth::check() && Auth::user()->rol->tipo_rol == 'Admin')
                        <li class="nav-item dropdown">
                            <div class="dropdown">
                                <a id="len1" class="hoverable dropdown-toggle" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gestionar
                                    Eventos
                                </a>
                                <ul class="dropdown-menu" id="drop" aria-labelledby="dropdownMenuButton1">
                                    <li><a id="len4" class="hoverable"
                                            href="{{ route('gestion.gestion') }}">Gestionar
                                            Eventos</a></li>
                                    <li><a id="len4" class="hoverable"
                                            href="{{ route('gestion.gestion_pelicula') }}">Gestionar
                                            Peliculas Catalogo</a></li>
                                    <li><a id="len4" class="hoverable"
                                            href="{{ route('gestion.gestion_pelicula_nueva') }}">Gestionar
                                            Peliculas Cartelera</a></li>
                                    <li><a id="len4" class="hoverable"
                                            href="{{ route('gestion.gestion_usuario') }}">Gestionar
                                            Usuarios</a></li>
                                    <li><a id="len4" class="hoverable"
                                            href="{{ route('gestion.gestion_cine') }}">Gestionar
                                            Cines</a></li>
                                    <li><a id="len4" class="hoverable"
                                            href="{{ route('gestion.gestion_actor') }}">Gestionar
                                            Actores</a></li>
                                    <li><a id="len4" class="hoverable"
                                            href="{{ route('gestion.gestion_categoria') }}">Gestionar
                                            Categorias</a></li>

                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
                <form class="d-flex" role="search">
                    <ul class="paginas-nav">
                        @if (Auth::check())
                            <li class="usuario-movil">{{ Auth::user()->nombre }}</li>
                            <li class="nav-item dropdown">
                                <div class="dropdown">
                                    <a id="len1" class="hoverable dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->nombre }}
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <a id="len1" class="hoverable dropdown-item"
                                            href="{{ route('logout') }}"><i id="len1"
                                                class=" hoverable fa fa-sign-out" aria-hidden=true></i>Logout</a>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li><a id="len1" class="hoverable" href="{{ route('login') }}">Iniciar Sesion</a></li>
                            <li><a id="len2" class="hoverable" href="{{ route('register') }}">Registrarse</a></li>
                        @endif
                    </ul>
                </form>

            </div>
        </nav>
    </div>
    <div id="app">
        @yield('contenido')
    </div>
    @section('footer')
        <div class="container text-primary">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 ">
                <div class="col mb-3  text-primary">
                    <a href="home"><img
                            src='https://i.postimg.cc/xXT44s4v/Screenshot-2025-03-11-at-19-02-06-Landing-Page-Landing-Celem-n.png'
                            alt='Screenshot-2025-03-11-at-19-02-06-Landing-Page-Landing-Celem-n' /></a>
                    <p class="text-primary">Donde estés, donde quieras.</p>
                </div>

                <div class="col mb-3">

                </div>

                <div class="col mb-3">
                    <ul class="nav flex-column ">
                        <li class="nav-item mb-2 "><a href="home" class="nav-link p-0 text-primary">Inicio</a></li>
                        <li class="nav-item mb-2"><a href="cartelera" class="nav-link p-0 text-primary">Cartelera</a>
                        </li>
                        <li class="nav-item mb-2"><a href="catalogo" class="nav-link p-0 text-primary">Catalogo</a></li>
                        <li class="nav-item mb-2"><a href="cine" class="nav-link p-0 text-primary">Cines</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-primary">Sobre Nosotros</a>
                        </li>
                    </ul>
                </div>

                <div class="col mb-3">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="mailto:elcorreoquequieres@correo.com"
                                class="nav-link p-0 text-primary">Correo electrónico</a>
                        </li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-primary">Enlaces</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-primary">Instagram</a></li>
                        <li class="nav-item mb-2"><a href="https://x.com/Film00o" class="nav-link p-0 text-primary">X</a>
                        </li>
                    </ul>
                </div>

                <div class="col mb-3">
                    <ul class="nav flex-column ">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-primary">Términos y
                                condiciones.</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-primary">Política de
                                privacidad.</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-primary">Preguntas
                                frecuentes
                                (FAQ)</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-primary">Información sobre
                                cookies</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    @show
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

</body>

</html>
