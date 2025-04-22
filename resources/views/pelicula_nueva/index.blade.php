@extends('index.index')
@section('contenido')
    <div class="reproductor">
        <div class="pelicula">
            <div class="degradado-info"></div>

            <div class="contenedor-imagen"  style="cursor: pointer;">
                <img id="imagenPelicula" src="{{ $pelicula->image }}" alt="" style="width: 120rem; height: 58rem; object-fit: cover;">
            </div>

        <iframe id="iframePelicula" class="iframe-pelicula" src="{{ $pelicula->pelicula_src }}" frameborder="0"
            scrolling="no" width="1905" height="940" allowfullscreen
            style="display: none; margin-top: 0rem;"></iframe>
  
                <div id="app">
                <chat 
                    :pelicula-id="{{ $pelicula->id }}"
                    :hora="'{{ $hora }}'"
                    :evento-id="{{ $eventoId }}"
                    :usuario-id="{{ auth()->id() }}"
                ></chat>
            </div>  

        <div class="info-peli">
            <div class="titulo-pelicula">
                <h1>{{ $pelicula->titulo }}</h1>
                <div class="hora">
                    <p>Hora seleccionada: <strong>{{ $hora }}</strong></p>
                </div>
            </div>

            <div class="categorias">
            </div>

            <div class="edad">
                <p>+ {{ $pelicula->restriccion_edad }}</p>
            </div>

            <div class="descripcion-peli">
                <p>{{ $pelicula->descripcion }}</p>
            </div>

            <div class="botones-pelicula">
                <div class="ver-ya">
                    <button>VER YA</button>
                    <a href="{{ $pelicula->pelicula_src }}">
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
            <p>{{ $pelicula->descripcion }}</p>
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
            @foreach ($pelicula->actores as $actor)
                <div class="actor"
                    style="background-image: url('{{ $actor->imagen }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
                    <div class="imagen">
                        <div class="nombre-actor">
                            <h4>{{ $actor->nombre }} {{ $actor->apellido }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
