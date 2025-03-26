@extends('index.index')

@section('contenido')
    <br><br><br>
    <div class="text-light">
        <div class="ticket">
            <div class="card mb-3" style="max-width: 1800px;">
                <div class="row g-0">
                    <!-- Columna para la imagen -->
                    <div class="col-md-5 d-flex justify-content-center align-items-center">
                        <img src="{{ $pelicula->image }}" alt="Trendy Pants and Shoes" id="image"
                            class="img-fluid rounded-start" style="max-width: 450px; height: 700px;" />
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
                                    <label for="exampleInputPassword1" class="form-label">Número de tarjeta</label>
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

    <style>
        .tickets {
            background-color: rgb(255, 255, 255);
            box-shadow: 0px 0px 20px #158effc5;
            border-radius: 15px;
            margin: 20px auto;
            transition: box-shadow 0.3s;
            width: 90ch;
            padding-right: 45vb;
            background-repeat: no-repeat;
        }

        .tickets:hover {
            box-shadow: 0 0 11px rgba(33, 33, 33, 0.2);
        }

        #image {
            width: 100%;
            /* Asegura que la imagen no sobresalga de su contenedor */

        }
    </style>
@endsection
