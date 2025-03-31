@extends('index.index')

@section('contenido')
    <br><br><br>
    <br>
    <div class="card mb-3" id="ticket">
        <div class="row g-0">
            <!-- Columna para la imagen -->
            <div class="col-md-5 d-flex ">
                <img src="{{ $pelicula->image }}" alt="Trendy Pants and Shoes" id="image" class="img-fluid rounded-start"
                    style=" height: 700px;" />
            </div>
            <!-- Columna para el formulario -->
            <div class="col-md-7">
                <div class="card-body">
                    <h2 class="card-title">Ticket de {{ $pelicula->titulo }}</h2>
                    <p>{{ $pelicula->descripcion }}</p>
                    <p><strong>Hora:</strong> {{ $hora }}</p>
                    <form id="formulario">
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label for="form4Example1" class="form-label">Nombre del titular</label>
                            <input type="text" name="nombre" class="form-control" id="form4Example1"
                                placeholder="Jordi C">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dirección de correo
                                electrónico</label>
                            <input type="email" name="correo" class="form-control" id="exampleInputEmail1"
                                placeholder="filmo@gmail.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNumeroTarjeta" class="form-label">Número de tarjeta</label>
                            <input type="text" name="numeroTarjeta" class="form-control" id="exampleInputNumeroTarjeta"
                                placeholder="ES01 1234 5678 9012">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputFechadeCaducidad" class="form-label">Fecha de caducidad</label>
                            <input type="date" name="fechaCaducidad" class="form-control"
                                id="exampleInputFechadeCaducidad">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">CVV</label>
                            <input class="required" id="field" type="number" max="999" min="-999"
                                name="cvv" />
                        </div>

                        <button type="submit" class="btn btn-secondary">PAGAR</button>

                        <a href="{{ route('pelicula.show', ['pelicula_nueva' => $pelicula->id, 'hora' => $hora]) }}"
                            class="ver-pelicula-btn">VER PELICULA</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
