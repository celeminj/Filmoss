<template>
    <div><button @click="showForm()" class="anadirBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg><strong> AÑADIR PELICULA NUEVA</strong></button></div>
         <div  class="tabla-peliculas-nuevas">
            <table class="tables-peliculaNueva">
                <thead >
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Duracion</th>
                    <th scope="col">Restriccion de edad</th>
                    <th scope="col">Calificacion</th>
                    <th scope="col">Idioma</th>
                    <th scope="col">Fecha de estreno</th>
                    <th scope="col">Link de la pelicula</th>
                    <th scope="col">Actores</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>

                    <tr v-for="pelicula_nueva in pelicula_nuevas" :key="pelicula_nueva.id">
                        <th scope="row">{{ pelicula_nueva.id }}</th>
                        <td>{{ pelicula_nueva.titulo }}</td>
                        <td>{{ pelicula_nueva.image }}</td>
                        <td>{{ pelicula_nueva.descripcion }}</td>
                        <td>{{ pelicula_nueva.duracion }}</td>
                        <td>{{ pelicula_nueva.restriccion_edad}}</td>
                        <td>{{ pelicula_nueva.calificacion}}</td>
                        <td>{{ pelicula_nueva.idioma}}</td>
                        <td>{{ pelicula_nueva.fecha_estreno}}</td>
                        <td>{{ pelicula_nueva.pelicula_src}}</td>
                        <span v-if="pelicula_nueva.actores">
    <span v-for="actor in pelicula_nueva.actores" :key="actor.id">
        {{ actor.nombre }}
    </span>
</span>

                        <th> <button @click="editPeliculaNueva(pelicula_nueva)" class="editarBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click="$event => eliminarPeliculaNueva(pelicula_nueva)" style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
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
            <h5 class="modal-title">Borrar pelicula nueva</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            </button>
        </div>
        <div class="modal-body">
            <p>¿ Seguro que quieres borrar a <strong>{{ pelicula_nueva.titulo }}</strong> ?</p>

            <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="$event => deleteUsuario(pelicula_nueva.id) ">Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal" tabindex="-1"  id="peliculaNuevaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 v-if="insert" class="modal-title">Crear Pelicula nueva</h5>
            <h5 v-else class="modal-title">Modificar Pelicula</h5>
        </div>
        <div class="modal-body">
                        <form>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formNombre" class="form-label">Titulo de la pelicula</label>
                                <input type="text" name="titulo" class="form-control" id="formNombre" required
                                    placeholder="Introducir nombre" v-model="pelicula_nueva.titulo">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formInputFecha" class="form-label">URL imagen</label>
                                <input type="text" name="image" class="form-control" id="formInputFecha"
                                    required v-model="pelicula_nueva.image">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="pelicula_nueva.descripcion">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Duracion</label>
                                <input type="number" name="duracion" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="pelicula_nueva.duracion">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Restriccion de edad</label>
                                <input type="text" name="restriccion_edad" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="pelicula_nueva.restriccion_edad">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Calificacion</label>
                                <input type="text" name="calificacion" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="pelicula_nueva.calificacion">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Idioma</label>
                                <input type="text" name="idioma" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="pelicula_nueva.idioma">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Fecha de estreno</label>
                                <input type="date" name="fecha_estreno" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="pelicula_nueva.fecha_estreno">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">URL de la pelicula</label>
                                <input type="text" name="pelicula_src" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required placeholder="Introducir correo electronico" v-model="pelicula_nueva.pelicula_src">
                            </div>
                            <div class="mb-3">
                        <label for="actores" class="form-label">Seleccionar Actores</label>
                        <select v-model="pelicula_nueva.actores" class="form-control" id="actores" multiple>
                            <option v-for="actor in actores" :key="actor.id" :value="actor.id">
                                {{ actor.nombre }}
                            </option>
                        </select>
                    </div>
                            </form>
                    <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button v-if="insert" type="button" class="btn btn-secondary" @click="insertPeliculaNueva()">Crear</button>
            <button v-else type="button" class="btn btn-secondary" @click="updatePeliculaNueva()">Editar</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
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
            pelicula_nuevas: [],
            myModal : {},
            pelicula_nueva: {},
            actores: [],
            messageError : "",
            isError : false,
            insert : false
        }
    },

    created() {
       this.selectPeliculaNueva();
       this.selectActores();
    },
        methods: {
            showForm(){
                this.insert = true;
                this.myModal = new bootstrap.Modal('#peliculaNuevaModal')
                this.myModal.show();
                this.pelicula_nueva = {};
            },
            selectActores() {
            const me = this;
            axios.get('actor')
                .then(response => {
                    me.actores = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
            updatePeliculaNueva(){
                const me = this;
                axios.put('pelicula_nueva/'+ me.pelicula_nueva.id, me.pelicula_nueva)
                .then(response => {
                    me.selectPeliculaNueva();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },
            insertPeliculaNueva(){
                const me = this;
                axios.post('pelicula_nueva', me.pelicula_nueva)
                .then(response => {
                    me.selectPeliculaNueva();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },selectPeliculaNueva(){
                const me = this;
                axios.get('pelicula_nueva')
                .then(response => {
                    me.pelicula_nuevas = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            editPeliculaNueva(pelicula_nueva){
                this.insert = false;
                this.pelicula_nueva = pelicula_nueva;
                this.myModal = new bootstrap.Modal('#peliculaNuevaModal')
                this.myModal.show();
            },
        eliminarPeliculaNueva(pelicula_nueva) {
            this.isError = false;
            this.pelicula_nueva = pelicula_nueva;
           this.myModal = new bootstrap.Modal('#deleteModal')
              this.myModal.show();
        },
        deleteUsuario(id){
            const me = this;
            axios.delete("pelicula_nueva/" + id)
            .then(response => {
                me.selectPeliculaNueva()
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
.tabla-peliculas-nuevas{
    margin-top: 20px;
    margin-bottom: 20px;
    background-color: #ffffff;
    box-shadow: #EAD2AC 0px 0px 10px;
    border-radius: 20px;
    padding: 10px;
    display: flex;
    color: #ffffff;
    width: 100rem;
    margin-left: 10rem;
}
.editarBoton{
    border: none;
    background: none;
    cursor: pointer;
    color: #2EBFA5;
}
    .anadirBoton{
        margin-left: 10rem;
        border: none;
        background: none;
        cursor: pointer;
        color: #2EBFA5;
    }
</style>
