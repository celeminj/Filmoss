@extends('index.index')
@section('contenido')

    <div class="titulo-gestion">
        <h1>GESTION DE USUARIOS</h1>
    </div>
    <div class="container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
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
                        <td>{{ $usuarios->contrasenya }}</td>
                        <td>{{ $usuarios->rol->tipo_rol }}</td>
                        {{-- <th> <a href="{{ route('usuario.edit', $usuarios->id) }}"><svg xmlns="http://www.w3.org/2000/svg" --}}
                        <th> <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></a></th>
                        <form method="POST"
                            action="{{ action([App\Http\Controllers\UsuarioController::class, 'destroy'], ['usuario' => $usuarios->id]) }}">
                            @csrf
                            @method('DELETE')
                            <th><button style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </th>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
