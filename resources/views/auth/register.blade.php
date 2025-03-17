@extends('index.index')
@section('contenido')
    <br>
    <br>
    <br>
    <div class="text-light">
        <h1>REGÍSTRATE</h1>
        <div class="container">
            <form>

                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="form4Example1" class="form-label">Nombre de usuario</label>
                    <input type="text" name="nombre" class="form-control" id="form4Example1">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
                    <input type="email" name="correo" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                    <input type="password" name="contrasenya" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Soy mayor de 18</label>
                </div>
                <a href="login">¿Ya tienes cuenta? Inicia sesión</a>
                <button type="submit" class="btn btn-secondary">Registrarme</button>
            </form>
        </div>
    </div>
