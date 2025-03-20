@extends('index.index')
@section('contenido')

    <div class="titulo-gestion">
        <h1>GESTION DE USUARIOS</h1>
    </div>
    <div class="tabla-gestion-usuario">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuario as $usuarios)
                    <tr>
                        <th scope="row">{{ $usuarios->id }}</th>
                        <td>{{ $usuarios->nombre }}</td>
                        <td>{{ $usuarios->fecha_nacimiento }}</td>
                        <td>{{ $usuarios->correo }}</td>
                        @foreach ($rol as $roles)
                            <td>{{ $roles->tipo_rol }}</td>
                        @endforeach
                        <th>Añadir Usuarios</th>
                        <th>Editar Usuarios</th>
                        <th>Borrar Usuarios</th>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
