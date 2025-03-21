@extends('index.index')
@section('contenido')
    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/login.css'])


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
                        <form class="container"
                            action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="POST">
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
