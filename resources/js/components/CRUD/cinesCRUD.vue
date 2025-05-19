<template>
    <div><button @click="showForm()" class="anadirBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg><strong> AÑADIR CINE</strong></button></div>
         <div  class="tabla-cines">
            <table class="table">
                <thead >
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Longitud</th>
                    <th scope="col">Latitud</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="cine in cines" :key="cine.id">
                        <th scope="row">{{ cine.id }}</th>
                        <td>{{ cine.nombre }}</td>
                        <td>{{ cine.longitud }}</td>
                        <td>{{ cine.latitud }}</td>
                        <td>{{ cine.image }}</td>
                        <th> <button @click="editCine(cine)" class="editarBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click="$event => eliminarCine(cine)" style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
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
    <div class="modal" tabindex="-1"  id="deleteModalCine">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Borrar Cine nuevo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

            </button>
        </div>
        <div class="modal-body">
            <p>¿ Seguro que quieres borrar a <strong>{{ cine.nombre }}</strong> ?</p>

            <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="$event => deleteCine(cine.id) ">Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal" tabindex="-1"  id="cineModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 v-if="insert" class="modal-title">Crear Cine nuevo</h5>
            <h5 v-else class="modal-title">Modificar Cine</h5>
        </div>
        <div class="modal-body">
                        <form>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="cineNombre" class="form-label">Titulo del Cine</label>
                                <input type="text" name="nombre" class="form-control" id="cineNombre" required
                                    placeholder="Introducir Nombre" v-model="cine.nombre">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="cineLongitud" class="form-label">Longitud</label>
                                <input type="number" name="longitud" class="form-control" id="cineLongitud"
                                    required v-model="cine.longitud">
                            </div>

                            <div class="mb-3">
                                <label for="cineLatitud" class="form-label">Latitud</label>
                                <input type="number" name="latitud" class="form-control" id="cineLatitud"
                                    required placeholder="Latitud" v-model="cine.latitud">

                            </div>
                            <div class="mb-3">
                                <label for="cineImage" class="form-label">URL Imagen</label>
                                <input type="text" name="image" class="form-control" id="cineImage"
                                    required placeholder="Imagen" v-model="cine.image">

                            </div>
                            </form>
                    <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button v-if="insert" type="button" class="btn btn-secondary" @click="insertCine()">Crear</button>
            <button v-else type="button" class="btn btn-secondary" @click="updateCine()">Editar</button>
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
            cines: [],
            myModal : {},
            cine: {},
            messageError : "",
            isError : false,
            insert : false
        }
    },

    created() {
       this.selectCine();

    },
        methods: {
            showForm() {
                this.insert = true;
                this.cine = {};
                let modal = new bootstrap.Modal(document.getElementById('cineModal'));
                modal.show();
            },
            updateCine(){
                const me = this;
                axios.put('cine/'+ me.cine.id, me.cine)
                .then(response => {
                    me.selectCine();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },
            insertCine(){
                const me = this;
                axios.post('cine', me.cine)
                .then(response => {
                    me.selectCine();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },selectCine(){
                const me = this;
                axios.get('cine/')
                .then(response => {
                    me.cines = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            editCine(cine) {
                this.insert = false;
                this.cine = cine;
                this.myModal = new bootstrap.Modal('#cineModal');
                this.myModal.show();
            },
            eliminarCine(cine) {
                this.isError = false;
                this.cine = cine;
                this.myModal = new bootstrap.Modal('#deleteModalCine');
                this.myModal.show();
            },
        deleteCine(id){
            const me = this;
            axios.delete("cine/" + id)
            .then(response => {
                me.selectCine()
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

.tabla-cines{
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
