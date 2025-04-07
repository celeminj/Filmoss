<template>
    <div><button @click="showForm()" class="anadirBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg><strong>AÑADIR EVENTOS</strong></button></div>
         <div  class="tabla-usuarios">
            <table class="table">
                <thead >
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo Evento</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha final</th>
                    <th scope="col">Pelicula añadidas</th>
                </tr>
            </thead>
            <tbody>

                    <tr v-for="evento_pelicula in evento_peliculas" :key="evento_pelicula.id">
                        <th scope="row">{{ evento_pelicula.id }}</th>
                        <td>{{ evento_pelicula.titulo_evento }}</td>
                        <td>{{ evento_pelicula.fecha_inicio }}</td>
                        <td>{{ evento_pelicula.fecha_final }}</td>
                        <span v-if="evento_pelicula.evento_pelicula_nueva">
                            <span v-for="pelicula_nueva in evento_pelicula.evento_pelicula_nueva" :key="pelicula_nueva.id">
                                {{ pelicula_nueva.titulo }}
                            </span>
                        </span>
                        <th> <button @click="editEvento(evento_pelicula)" class="editarBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click="$event => eliminarUsuario(evento_pelicula)" style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
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
    <div class="modal" tabindex="-1"  id="deleteEventoModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Borrar evento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            </button>
        </div>
        <div class="modal-body">
            <p>¿ Seguro que quieres borrar a <strong>{{ evento_pelicula.titulo_evento }}</strong> ?</p>

            <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="$event => deleteUsuario(evento_pelicula.id) ">Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal" tabindex="-1"  id="eventoModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 v-if="insert" class="modal-title">Crear Evento</h5>
            <h5 v-else class="modal-title">Modificar Evento</h5>
        </div>
        <div class="modal-body">
                        <form>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formNombre" class="form-label">Nombre de evento</label>
                                <input type="text" name="titulo_evento" class="form-control" id="formNombre" required
                                    placeholder="Introducir titulo" v-model="evento_pelicula.titulo_evento">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="formInputFecha" class="form-label">Fecha de inicio</label>
                                <input type="date" name="fecha_inicio" class="form-control" id="formInputFecha"
                                    required v-model="evento_pelicula.fecha_inicio">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEvento" class="form-label">Fecha final</label>
                                <input type="date" name="fecha_final" class="form-control" id="exampleInputEvento"
                                    aria-describedby="eventoHelp" required placeholder="Introducir fecha final" v-model="evento_pelicula.fecha_final">

                            </div>
                            <div class="mb-3">
                        <label for="pelis" class="form-label">Seleccionar Peliculas</label>
                        <select v-model="evento_pelicula.evento_pelicula_nueva" class="form-control" id="pelis" multiple>
                            <option v-for="pelicula_nueva in peliculas_nuevas" :key="pelicula_nueva.id" :value="pelicula_nueva.id">
                                {{ pelicula_nueva.titulo }}
                            </option>
                        </select>
                    </div>
                            </form>
                    <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button v-if="insert" type="button" class="btn btn-secondary" @click="insertUsuarios()">Añadir</button>
            <button v-else type="button" class="btn btn-secondary" @click="updateUsuarios()">Editar</button>
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
            evento_peliculas: [],
            peliculas_nuevas: [],
            myModal : {},
            evento_pelicula: {},
            messageError : "",
            isError : false,
            insert : false
        }
    },

    created() {
       this.selectEvento();
        this.selectPelicula_nueva();
    },
        methods: {
            showForm(){
                this.insert = true;
                this.isError = false
                this.myModal = new bootstrap.Modal('#eventoModal')
                this.myModal.show();
                this.evento_pelicula = {};
            },
            selectPelicula_nueva(){
                const me = this;
                axios.get('pelicula_nueva')
                .then(response => {
                    me.peliculas_nuevas = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            updateUsuarios(){
                const me = this;
                axios.put('evento_pelicula/'+ me.evento_pelicula.id, me.evento_pelicula)
                .then(response => {
                    me.selectEvento();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },
            insertUsuarios(){
                const me = this;
                axios.post('evento_pelicula', me.evento_pelicula)
                .then(response => {
                    me.selectEvento();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },selectEvento(){
                const me = this;
                axios.get('evento_pelicula')
                .then(response => {
                    me.evento_peliculas = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            editEvento(evento_pelicula){
                this.insert = false;
                this.evento_pelicula = evento_pelicula;
                this.myModal = new bootstrap.Modal('#eventoModal')
                this.myModal.show();
            },
        eliminarUsuario(evento_pelicula) {
            this.isError = false;
            this.evento_pelicula = evento_pelicula;
           this.myModal = new bootstrap.Modal('#deleteEventoModal')
              this.myModal.show();
        },
        deleteUsuario(id){
            const me = this;
            axios.delete("evento_pelicula/" + id)
            .then(response => {
                me.selectEvento()
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
