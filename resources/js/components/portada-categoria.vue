<template>
    <div class="porque-has-visto-interior" v-if="ultimasPeliculas.length > 0">
      <div v-for="(pelicula, index) in ultimasPeliculas" :key="index">

        <div v-if="index === 0" class="porque-has-visto-1"
             :style="{
               backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
               backgroundSize: 'cover',
               backgroundPosition: 'center',
               backgroundRepeat: 'no-repeat'
             }">
          <div class="titulo-peli1-porque">
            <h3>{{ pelicula.titulo }}</h3>
          </div>
          <div class="duracion-peli1-porque">
            <h5>{{ pelicula.duracion }} min.</h5>
          </div>
          <div class="restriccion-edad">
            <p>+{{ pelicula.restriccion_edad }}</p>
          </div>
        </div>

        <div v-else class="porque-has-visto-3"
             :style="{
               backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
               backgroundSize: 'cover',
               backgroundPosition: 'center',
               backgroundRepeat: 'no-repeat'
             }">
          <h3>{{ pelicula.titulo }}</h3>
        </div>

      </div>
    </div>
  </template>


  <script>
  import axios from 'axios';
  import * as bootstrap from 'bootstrap';
  export default {
      props: {
          idCategoria: {
              type: Number,
              required: true
          }
      },
      data() {
          return {
              peliculas: [],
          }
      },
      computed: {
          ultimasPeliculas() {
              return this.peliculas.slice(-3);
          }
      },
      methods: {
          cargarPeliculasPorCategoria() {
              axios.get(`/categorias/${this.idCategoria}/peliculas`)
                  .then(response => {
                      this.peliculas = response.data;
                  })
                  .catch(error => {
                      console.log(error);
                  });
          }
      },
      watch: {
          idCategoria(newId) {
              this.cargarPeliculasPorCategoria();
          }
      },
      mounted() {
          this.cargarPeliculasPorCategoria();
      }
  }
  </script>

  <style scoped>
  .portada-categoria {
      color: #EAD2AC;
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      max-width: none;
      transform-origin: center center;
  }
  .porque-has-visto-interior {
      color: #2EBFA5;
  }
.porque-has-visto-3 {
      width: 200px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

  }
  .porque-has-visto-interior {
  display: flex;
  gap: 1rem;
  margin-top: 1rem;
}

.porque-has-visto-1 {
  flex: 2;
  padding: 1rem;
  color: white;
  border-radius: 10px;
  height: 250px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}

.porque-has-visto-3 {
  flex: 1;
  height: 250px;
  padding: 0.5rem;
  color: #2EBFA5;
  border-radius: 10px;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  text-align: center;
}

.titulo-peli1-porque h3,
.duracion-peli1-porque h5,
.restriccion-edad p {
  margin: 0;
}

  </style>
