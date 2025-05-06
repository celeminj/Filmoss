@extends('index.index')
@section('contenido')
    <div class="reproductor">
        <div class="pelicula">
            <div class="degradado-info">
                <a href="{{ $pelicula->pelicula_src }}"></a>
            </div>
            {{-- <iframe src="{{ $pelicula->pelicula_src }}" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"
                width="1900" height="1000" allowfullscreen></iframe> --}}
                <div class="portada-pelicula">
                    <a href="{{ $pelicula->pelicula_src }}">
                        <img src="{{ $pelicula->image }}" alt="">
                    </a>
                </div>

        </div>

        <div class="info-peli-cat">
            <div class="titulo-pelicula">
                <h1>{{ $pelicula->titulo }}</h1>
            </div>
            <div class="categorias">
                @foreach ($pelicula->categorias as $categoria)
                    <p>{{ $categoria->categoria }}</p>
                @endforeach
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
                <div id="app">
                <metodo-pago></metodo-pago>
                </div>
                <div class="ver-ya">
                    <button>VER YA
                    <a href="{{ $pelicula->pelicula_src }}">
                        <div class="play-button"></div>
                    </a>
                    </button>
                </div>
                <div class="otros-botones">
                    <div class="heart-cat">
                        <img src="{{ asset('images/corazon.png')}}" alt="">
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
            @foreach ($pelicula->categorias as $categoria)
                <p>{{ $categoria->categoria }}</p>
            @endforeach


            <h4>Fecha de estreno</h4>
            <p>{{ $pelicula->fecha_estreno }}</p>
            <h4>Calificacion: {{ $pelicula->calificacion }}/10</h4>
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
             style="background-image: url('{{ asset($actor->imagen) }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
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
