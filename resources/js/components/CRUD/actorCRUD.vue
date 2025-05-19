<template>
    <div class="tab-actor">
    <div><button @click="showForm()" class="anadirBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg><strong> AÑADIR ACTOR</strong></button></div>
         <div  class="tabla-actor">
            <table class="table">
                <thead >
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="actor in actores" :key="actor.id">
                        <th scope="row">{{ actor.id }}</th>
                        <td>{{ actor.nombre }}</td>
                        <td>{{ actor.apellido }}</td>
                        <td>{{ actor.imagen }}</td>

                        <th> <button @click="editActor(actor)" class="editarBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click="$event => eliminarActor(actor)" style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
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
</div>
    <!-- Modal para borrar-->
    <div class="modal" tabindex="-1"  id="deleteModalActor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Borrar Actor nuevo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            </button>
        </div>
        <div class="modal-body">
            <p>¿ Seguro que quieres borrar a <strong>{{ actor.nombre }}</strong> ?</p>

            <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="$event => deleteActor(actor.id) ">Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal" tabindex="-1"  id="cineActor">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 v-if="insert" class="modal-title">Crear actor nuevo</h5>
            <h5 v-else class="modal-title">Modificar Actor</h5>
        </div>
        <div class="modal-body">
                        <form>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="actorNombre" class="form-label">Titulo del Cine</label>
                                <input type="text" name="nombre" class="form-control" id="actorNombre" required
                                    placeholder="Introducir Nombre" v-model="actor.nombre">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="actorApellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="actorApellido"
                                    required v-model="actor.apellido">
                            </div>

                            <div class="mb-3">
                                <label for="actorImagen" class="form-label">Imagen</label>
                                <input type="file" name="imagen" class="form-control" id="actorImagen"
                                    required @change="subirImagen">
                            </div>
                            </form>
                    <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button v-if="insert" type="button" class="btn btn-secondary" @click="insertActor()">Crear</button>
            <button v-else type="button" class="btn btn-secondary" @click="updateActor()">Editar</button>
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
            actores: [],
            myModal : {},
            actor: {},
            messageError : "",
            isError : false,
            insert : false
        }
    },

    created() {
       this.selectActor();

    },
        methods: {
            showForm() {
                this.insert = true;
                this.actor = {};
                let modal = new bootstrap.Modal(document.getElementById('cineActor'));
                modal.show();
            },
            updateActor(){
                const me = this;
                            let formData = new FormData();
                formData.append('nombre', me.actor.nombre);
                formData.append('apellido', me.actor.apellido);

                                if (me.actor.imagen) {
                        formData.append('imagen', me.actor.imagen);
                    }

               
                    axios.put('actor/' + me.actor.id, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },
            subirImagen(event){
                const me = this;
                me.actor.imagen = event.target.files[0];
            },
            insertActor(){
                const me = this;

                let formData = new FormData();

                formData.append('nombre', me.actor.nombre);
                formData.append('apellido', me.actor.apellido);
                formData.append('imagen', me.actor.imagen);
                
                axios.post('actor', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                    })
                .then(response => {
                    me.selectActor();
                    me.myModal.hide();
                })

                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });

            },selectActor(){
                const me = this;
                axios.get('actor/')
                .then(response => {
                    me.actores = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            editActor(actor) {
                this.insert = false;
                this.actor = actor;
                this.myModal = new bootstrap.Modal('#cineActor');
                this.myModal.show();
            },
            eliminarActor(actor) {
                this.isError = false;
                this.actor = actor;
                this.myModal = new bootstrap.Modal('#deleteModalActor');
                this.myModal.show();
            },
        deleteActor(id){
            const me = this;
            axios.delete("actor/" + id)
            .then(response => {
                me.selectActor()
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
.tabla-actor{
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
