<template>
    <div><button @click="showForm()">Añadir Usuario</button></div>
         <div  class="tabla-usuarios">
            <table class="table">
                <thead >
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

                    <tr v-for="usuario in usuarios" :key="usuario.id">
                        <th scope="row">{{ usuario.id }}</th>
                        <td>{{ usuario.nombre }}</td>
                        <td>{{ usuario.fecha_nacimiento }}</td>
                        <td>{{ usuario.correo }}</td>
                        <td>{{ usuario.contrasenya }}</td>
                        <td>{{ usuario.rol.tipo_rol}}</td>

                        <th> <button @click="editCicle(usuario)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click="$event => eliminarUsuario(usuario)" style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                        </svg>
                                    </button>
                                </th>
                    </tr>
            </tbody>
        </table>

    </div>
    <!-- Modal para borrar-->
    <div class="modal" tabindex="-1"  id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Borrar usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            </button>
        </div>
        <div class="modal-body">
            <p>¿ Seguro que quieres borrar a <strong>{{ usuario.nombre }}</strong> ?</p>

            <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="$event => deleteUsuario(usuario.id) ">Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal" tabindex="-1"  id="usuarioModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Crear usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                        <form>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formNombre" class="form-label">Nombre de usuario</label>
                                <input type="text" name="nombre" class="form-control" id="formNombre" required
                                    placeholder="Introducir nombre" v-model="usuario.nombre">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formInputFecha" class="form-label">Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" id="formInputFecha"
                                    required v-model="usuario.fecha_nacimiento">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dirección de correo electrónico</label>
                                <input type="email" name="correo" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="usuario.correo">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                                <input type="password" name="contrasenya" class="form-control" id="exampleInputPassword1"
                                    required placeholder="Introducir contraseña" v-model="usuario.contrasenya">
                            </div>
                                <!-- <div  class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Rol
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item">{{ usuario.rol.tipo_rol}}</a></li>
                                    </ul>
                                    </div> -->
                        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Añadir</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>
</template>
<script>
import * as bootstrap from 'bootstrap';

export default {
    data() {
        return{
            usuarios: [],
            myModal : {},
            usuario: {},
            messageError : "",
            isError : false,
        }
    },

    created() {
       this.selectUsuario();
    },
        methods: {
            showForm(){
                this.myModal = new bootstrap.Modal('#usuarioModal')
                this.myModal.show();
            },
                    selectUsuario(){
                        const me = this;
                axios.get('usuario')
                .then(response => {
                    me.usuarios = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            editCicle(usuario){
                // this.usuario = usuario;
                // this.myModal = new bootstrap.Modal('#usuarioModal')
                // this.myModal.show();
            },
        eliminarUsuario(usuario) {
            this.isError = false;
            this.usuario = usuario;
           this.myModal = new bootstrap.Modal('#deleteModal')
              this.myModal.show();
        },
        deleteUsuario(id){
            const me = this;
            axios.delete("usuario/" + id)
            .then(response => {
                me.selectUsuario()
                me.myModal.hide()
        })
        .catch(error => {
            this.isError = true;
            me.messageError = error.response.data.message;
        });
        }
    },

    mounted() {}

}
    </script>

<style>
.tabla-usuarios{

    margin-top: 20px;
    margin-bottom: 20px;
    background-color: #ffffff;
    border-radius: 20px;
    padding: 10px;
    display: flex;
    color: #ffffff;
    width: 100rem;
    margin-left: 10rem;
}
</style>
