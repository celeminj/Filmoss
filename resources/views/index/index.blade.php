<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('icons/ico.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/css/app.scss', 'resources/js/app.js'])
    <title>Filmo</title>
</head>

<body>

    <div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <a href="home"><img
                        src='https://i.postimg.cc/xXT44s4v/Screenshot-2025-03-11-at-19-02-06-Landing-Page-Landing-Celem-n.png'
                        alt='Screenshot-2025-03-11-at-19-02-06-Landing-Page-Landing-Celem-n' /></a>
                <ul class="paginas-nav">
                    <li><a id="len1" class="hoverable" href="home">Inicio</a></li>
                    <li><a id="len2" class="hoverable" href="cartelera">Cartelera</a></li>
                    <li><a id="len3" class="hoverable" href="catalogo">Catalogo</a></li>
                    <li><a id="len4" class="hoverable" href="cine">Cines</a></li>
                </ul>
                <ul class="paginas-nav">
                    <li><a id="len1" class="hoverable" href="login">Iniciar Sesion</a></li>
                    <li><a id="len2" class="hoverable" href="register">Registrarse</a></li>

                </ul>
            </div>
        </nav>
    </div>
    <div id="film">
        @yield('contenido')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
