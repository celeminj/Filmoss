@extends('index.index')
@section('contenido')
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        @foreach ($peliculas as $pelicula)
            <div class="col-md-4 mb-4">
                <div class="movie-card ">
                    <div class="movie-overlay">
                        <img src="{{ $pelicula->image }}" class="card-img-top" alt="Imagen de la película">
                        <div class="movie-title">
                            {{ $pelicula->titulo }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{ $peliculas->links() }}
            </ul>
        </nav>
    </div>
    <br>
    <br>
    <div id="categoria-titulo">
        <H1><strong>CATEGORÍAS</strong></H1>
    </div>
    <div class="text-primary" id="categorias">
        <div class="card-categorias" data-bg="accion">
            <h2>ACCIÓN</h2>
        </div>
        <div class="card-categorias" data-bg="aventura">
            <h2>AVENTURA</h2>
        </div>
        <div class="card-categorias" data-bg="ciencia-ficcion">
            <h2>CIENCIA FICCIÓN</h2>
        </div>
        <div class="card-categorias" data-bg="comedia">
            <h2>COMEDIA</h2>
        </div>
    </div>
@endsection
