<template>
     <form class="container" action="{{ action([App\Http\Controllers\UsuarioController::class, 'update']) }}" method="PUT">
           @csrf
           @method('PUT')

           <label for="nombre">Nombre:</label>
           <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>

           <label for="correo">Correo:</label>
           <input type="email" id="correo" name="correo" value="{{ $usuario->correo }}" required>

           <button type="submit">Actualizar Usuario</button>
       </form>
</template>
<script>
export default {
    data() {
        return{

        }
    },
    methods: {

    },
    mounted() {}

}
    </script>

<style>
</style>
