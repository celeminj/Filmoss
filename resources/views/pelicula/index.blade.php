@extends('index.index')
@section('contenido')
    <div class="reproductor">
        <div class="pelicula">
            <div class="degradado-info">
                <a href="https://Smoothpre.com/embed/agtchgjvv15l"></a>
            </div>
            {{-- <iframe src="{{ $pelicula->pelicula_src }}" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"
                width="1900" height="1000" allowfullscreen></iframe> --}}
            <a href="https://Smoothpre.com/embed/agtchgjvv15l"><img src="{{ $pelicula->image }}" alt="" STYLE="width: 120REM; height: 58REM;"></a>
        </div>

        <div class="info-peli">
            <div class="titulo-pelicula">
                <h1>{{ $pelicula->titulo }}</h1>
                <div class="hora">
                    <p>Hora seleccionada:
                        <strong>
                            {{ $hora }}
                        </strong>
                    </p>
                </div>

            </div>
            <div class="categorias">
                <p>Comedia, acción, animación</p>

            </div>
            <div class="edad">
                <p>+ {{ $pelicula->restriccion_edad }}</p>
            </div>

            <div class="descripcion-peli">
                <p>
                    {{ $pelicula->descripcion }}
                </p>
            </div>
            <div class="botones-pelicula">
                <div class="ver-ya">
                    <button>VER YA</button>
                    <a href="https://Smoothpre.com/embed/agtchgjvv15l">
                        <div class="play-button"></div>
                    </a>
                </div>
                <div class="otros-botones">
                    <div class="trailer">
                        <button>Trailer</button>
                    </div>
                    <div class="heart">
                        {{-- <button>Favoritos</button> --}}
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="detalles">
        <div class="titulo-detalles">
            <h1>DETALLES</h1>
        </div>
        <div class="texto-detalles">
            <h2>{{ $pelicula->titulo }}</h2>
            <p> {{ $pelicula->descripcion }}</p>
            <h4>Género</h4>
            <p>Comedia, acción, animación</p>
            <h4>Fecha de estreno</h4>
            <p>{{ $pelicula->fecha_estreno }}</p>
            <h4>{{ $pelicula->calificacion }}/10</h4>
            <p>Edad: + {{ $pelicula->restriccion_edad }}</p>
        </div>

    </div>
    <div class="reparto">
        <div class="titulo-reparto">
            <h1>REPARTO</h1>
        </div>
        <div class="actores">

        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let container = document.querySelector(".actores");

        if (container) {
            for (let i = 0; i < 9; i++) {
                agregarActor(container, i + 1);
            }
        }
    });

    function agregarActor(container, index) {
        let actorHTML = `
                <div class="actor">
                    <div class="imagen">
                        <div class="nombre-actor">
                            <h4>Actor ${index}</h4>
                        </div>
                    </div>
                </div>
            `;

        container.innerHTML += actorHTML;
    }
</script>
