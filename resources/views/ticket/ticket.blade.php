@extends('index.index')

@section('contenido')
    <br><br><br>
    <div class="text-light">
        <h1>TICKET</h1>
        <div class="container">
            <div class="pelicula-detalle">
                <h2>{{ $pelicula->titulo }}</h2>
                <p>{{ $pelicula->descripcion }}</p>
                <p><strong>Hora:</strong> {{ $hora }}</p>
                <img src="{{ $pelicula->image }}" alt="">
            </div>
            <form>


                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="form4Example1" class="form-label">Nombre del titular</label>
                    <input type="text" name="nombre" class="form-control" id="form4Example1" placeholder="Jordi C">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
                    <input type="email" name="correo" class="form-control" id="exampleInputEmail1"
                        placeholder="filmo@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Numero de tarjeta</label>
                    <input type="text" name="numeroTarjeta" class="form-control" id="exampleInputPassword1"
                        placeholder="ES01 1234 5678 9012">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Fecha de caducidad</label>
                    <input type="date" name="fechaCaducidad" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">CVV</label>
                    <input class="required" id="field" type="number" max="999" min="-999" name="cvv" />
                </div>

                <button type="submit" class="btn btn-secondary">PAGAR</button>

                <a href="{{ route('pelicula.show', ['pelicula_nueva' => $pelicula->id, 'hora' => $hora]) }}"
                    class="ver-pelicula-btn">VER PELICULA</a>

            </form>
        </div>
    </div>
@endsection
