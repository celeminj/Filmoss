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
@endsection
