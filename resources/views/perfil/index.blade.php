@extends('index.index')
@section('contenido')
    <div id="app">
        <perfil :id-usuario="{{ $usuario->id }}"></perfil>
    </div>
@endsection
