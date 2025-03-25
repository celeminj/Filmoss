@extends('index.index')
@section('contenido')
    <div class="text-light">
        <div class="containers">
            <div class="container-1">
                <img src="{{ asset('images/filmo-logo.png') }}" alt="">
            </div>

            <div class="fondo-container-2">
                <div class="imagen-fondo" style="background-image: url('{{ asset('images/log.png') }}');"></div>
                <div class="container-2">
                    <div class="fondo-container-2">
                        <div class="titulo-registro">
                            <h1>REGISTRO</h1>
                        </div>
                        <form action="{{ action([App\Http\Controllers\Api\UsuarioController::class, 'register']) }}"
                            method="POST">
                            @csrf
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formNombre" class="form-label">Nombre de usuario</label>
                                <input type="text" name="nombre" class="form-control" id="formNombre" required
                                    placeholder="Introducir nombre">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formInputFecha" class="form-label">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" id="formInputFecha"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
                                <input type="email" name="correo" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" name="contrasenya" class="form-control" id="exampleInputPassword1"
                                    required placeholder="Introducir contraseña">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">Accepto las politicas sobre informacion
                                    y cookies</label>
                            </div>
                            <div class="seccion-boton">
                                <div class="inicio-sesion">
                                    <a href="login">¿Ya tienes cuenta? Inicia sesión</a>
                                </div>
                                <div class="boton-reg">
                                    <button type="submit" class="btn btn-secondary"
                                        id="boton-registrarme">Registrarme</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
