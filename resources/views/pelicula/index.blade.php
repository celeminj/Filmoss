@extends('index.index')

@section('contenido')
    <br><br><br>
    <div class="text-light">
        <h1>{{ $pelicula->titulo }}</h1>
        <p><strong>Hora seleccionada:</strong> {{ $hora }}</p>

        <iframe src="{{ $pelicula->pelicula_src }}" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" width="1900"
            height="1000" allowfullscreen></iframe>
    </div>
@endsection
