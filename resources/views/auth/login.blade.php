@extends('index.index')
@section('contenido')
    <br>
    <br>
    <br>
    <div class="text-light">
        <h1>INICIAR SESIÓN</h1>
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
                <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" name="contrasenya" class="form-control" id="exampleInputPassword1">
            </div>

            <a href="register">¿No tienes cuenta? Registrate aqui</a>
            <button type="submit" class="btn btn-secondary">Iniciar sesión</button>
        </form>
    </div>
