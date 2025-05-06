@extends('index.index')

@section('contenido')
    <div id="app">
        <div class="card mb-3" id="ticket">
            <div class="row g-0">

                <div class="col-md-5 d-flex ">
                    <img src="{{ $pelicula->image }}" alt="Trendy Pants and Shoes" id="image"
                        class="img-fluid rounded-start" style=" height: 700px; object-fit: cover;" />
                </div>

                <div class="col-md-7">
                    <div class="card-body">
                        <h2 class="card-title">Ticket de {{ $pelicula->titulo }}</h2>
                        <p>{{ $pelicula->descripcion }}</p>
                        <p><strong>Hora:</strong> {{ $hora }}</p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="formulario" method="POST" action="{{ route('ticket.enviar') }}">
                            @csrf
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="form4Example1" class="form-label">Nombre del titular</label>
                                <input type="text" name="nombre" required class="form-control" id="form4Example1"
                                    placeholder="Nombre completo">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dirección de correo
                                    electrónico</label>
                                <input type="email" name="correo" required class="form-control" id="exampleInputEmail1"
                                    placeholder="filmo@gmail.com">
                                <input type="hidden" name="pelicula_id" value="{{ $pelicula->id }}">
                                <input type="hidden" name="hora" value="{{ $hora }}">
                            </div>
                            <div class="botones-ticket">
                                <button type="submit" class="btn btn-secondary">REGISTRARSE</button>
                                <a href="{{ route('pelicula.show', ['pelicula_nueva' => $pelicula->id, 'hora' => $hora, 'evento_id' => $evento->id]) }}"
                                    class="btn btn-secondary">
                                    VER PELÍCULA
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
