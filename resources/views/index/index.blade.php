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

    <div class="container-fluid">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <a href="" target='_blank'><img
                        src='https://i.postimg.cc/xXT44s4v/Screenshot-2025-03-11-at-19-02-06-Landing-Page-Landing-Celem-n.png'
                        alt='Screenshot-2025-03-11-at-19-02-06-Landing-Page-Landing-Celem-n' /></a>
                <ul class="paginas-nav">
                    <li><a id="len1" class="hoverable" href="home">Inicio</a></li>
                    <li><a id="len2" class="hoverable" href="cartelera">Cartelera</a></li>
                    <li><a id="len3" class="hoverable" href="#">Catalogo</a></li>
                    <li><a id="len4" class="hoverable" href="cine">Cines</a></li>
                </ul>
                <ul class="paginas-nav">
                    <li><a id="len1" class="hoverable" href="#">Iniciar Sesion</a></li>
                    <li><a id="len2" class="hoverable" href="#">Registrarse</a></li>

                </ul>
            </div>
        </nav>
    </div>
    <div>
        <h1 class="text-center"><strong>FILMOFILMOFILMOFILMOFILMO</strong></h1>

    </div>
    @yield('contenido')
</body>

</html>
