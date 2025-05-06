@extends('index.index')
@section('contenido')
<button id="toggleMenuBtn">☰ </button>
    <div class="text-light">
        <div class="containers">
            <div class="container-1">
                <img src="{{ asset('images/filmo-logo.png') }}" alt="">
            </div>

            <div class="fondo-container-2">
                <div class="imagen-fondo" style="background-image: url('{{ asset('images/log.png') }}');"></div>
                <div class="container-2">
                    <div class="fondo-container-2">
                        <div class="titulo-inicio">
                            <h1>INICIAR SESIÓN</h1>
                        </div>
                         @if (session('error'))
                         <div class="alert alert-danger">
                            {{ session('error') }}
                         </div>

                         @endif
                        <form class="container" id="formulario"
                            action="{{ action([App\Http\Controllers\Api\UsuarioController::class, 'login']) }}"
                            method="POST">
                            @csrf
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="form4Example1" class="form-label">Dirección de correo electrónico</label>
                                <input type="text" name="correo" class="form-control" id="form4Example1">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" name="contrasenya" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="seccion-boton">
                                <div class="inicio-sesion">
                                    <a href="register">¿No tienes cuenta? Registrate aqui</a>

                                </div>
                                <div class="boton-reg">
                                    <button type="submit" class="btn btn-secondary" id="boton-log">Iniciar sesión</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('toggleMenuBtn');
    const nav = document.querySelector('.paginas-nav');

    toggleBtn.addEventListener('click', function () {
        nav.classList.toggle('show');
    });
});

</script>
@section('footer', '')
