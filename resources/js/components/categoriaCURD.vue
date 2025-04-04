<template>
    <div><button @click="showForm()" class="anadirBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
</svg><strong>AÑADIR CATEGORIA</strong></button></div>
         <div class="tabla-categoria">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Imagenes</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="categoria in categorias" :key="categoria.id">
                        <th scope="row">{{ categoria.id }}</th>
                        <td>{{ categoria.categoria }}</td>
                        <td>{{ categoria.image }}</td>
                        <th> <button @click="editCategoria(categoria)" class="editarBoton"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" >
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></button></th>
                                <th>
                                    <button  @click="eliminarCategoria(categoria)" style="border: none; background: none; cursor: pointer; color:rgb(255, 0, 0)">
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
    <div class="modal" tabindex="-1"  id="deleteModalCategoria">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Borrar Categoria nueva</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <p>¿ Seguro que quieres borrar a <strong>{{ categoria.categoria }}</strong> ?</p>

            <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" @click="deleteCategoria(categoria.id)">Borrar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
        </div>
    </div>
</div>

   <!-- modal insert/update -->
   <div class="modal" tabindex="-1"  id="categoriaModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 v-if="insert" class="modal-title">Crear Categoria nuevo</h5>
            <h5 v-else class="modal-title">Modificar Categoria</h5>
        </div>
        <div class="modal-body">
                        <form>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="categoriaCat" class="form-label">Categoria</label>
                                <input type="text" name="categoria" class="form-control" id="categoriaCat" required
                                    placeholder="Introducir Categoria" v-model="categoria.categoria">
                            </div>
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label for="categoriaImg" class="form-label">Imagenes</label>
                                <input type="text" name="image" class="form-control" id="categoriaImg" required
                                    placeholder="Introducir Imagen url" v-model="categoria.image">
                            </div>
                            </form>
                    <p v-if="isError" class="alert alert-danger">{{ messageError }}</p>
        </div>
        <div class="modal-footer">
            <button v-if="insert" type="button" class="btn btn-secondary" @click="insertCategoria()">Crear</button>
            <button v-else type="button" class="btn btn-secondary" @click="updateCategoria()">Editar</button>
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
            categorias: [],
            myModal : {},
            categoria: {},
            messageError : "",
            isError : false,
            insert : false
        }
    },

    created() {
       this.selectCategoria();

    },
        methods: {
            showForm() {
                this.insert = true;
                this.categoria = {};
                let modal = new bootstrap.Modal(document.getElementById('categoriaModal'));
                modal.show();
            },
            updateCategoria(){
                const me = this;
                axios.put('categoria/'+ me.categoria.id, me.categoria)
                .then(response => {
                    me.selectCategoria();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },
            insertCategoria(){
                const me = this;
                axios.post('categoria', me.categoria)
                .then(response => {
                    console.log(response);
                    me.selectCategoria();
                    me.myModal.hide();
                })
                .catch(error => {
                    this.isError = true;
                    me.messageError = error.response.data.message;
                });
            },selectCategoria(){
                const me = this;
                axios.get('categoria/')
                .then(response => {
                    me.categorias = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
            },
            editCategoria(categoria) {
                this.insert = false;
                this.categoria = categoria;
                this.myModal = new bootstrap.Modal('#categoriaModal');
                this.myModal.show();
            },
            eliminarCategoria(categoria) {
                this.isError = false;
                this.categoria = categoria;
                this.myModal = new bootstrap.Modal('#deleteModalCategoria');
                this.myModal.show();
            },
            deleteCategoria(id){
            const me = this;
            axios.delete("categoria/" + id)
            .then(response => {
                me.selectCategoria()
                me.myModal.hide()
        })
        .catch(error => {
            this.isError = true;
            me.messageError = error.response.data.message;
        });
        }
    },
    mounted(){}
}
</script>
<style scoped>
.tabla-peliculas {
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

.editarBoton, .anadirBoton {
  border: none;
  background: none;
  cursor: pointer;
  color: #2EBFA5;
}
</style>

