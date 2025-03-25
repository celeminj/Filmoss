@extends('index.index')

@section('contenido')
    <br><br><br>
    <div class="text-light">
        <h1>TICKET</h1>
        <div class="container">
            <div class="card mb-3" style="max-width: 1800px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $pelicula->image }}" alt="Trendy Pants and Shoes" class="img-fluid rounded-start"
                            style="max-width: 450px; height: 700px" />

                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">{{ $pelicula->titulo }}</h3>
                            <p>{{ $pelicula->descripcion }}</p>
                            <p><strong>Hora:</strong> {{ $hora }}</p>
                            <form>
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
                                    <label for="exampleInputPassword1" class="form-label">Numero de tarjeta</label>
                                    <input type="text" name="numeroTarjeta" class="form-control"
                                        id="exampleInputPassword1" placeholder="ES01 1234 5678 9012">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Fecha de caducidad</label>
                                    <input type="date" name="fechaCaducidad" class="form-control"
                                        id="exampleInputPassword1">
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

        </div>
    </div>
@endsection
