<template>
    <div class="reproductor" v-for="pelicula in peliculas" :key="pelicula.id">
      <div class="pelicula">
        <div class="degradado-info">
          <!-- <a :href="`pelicula/${pelicula.id }}`"></a> -->
        </div>

        <!-- <a :href="`pelicula/${pelicula.id }}`"> -->
          <img :src="pelicula.image" alt="" :style="{ width: '120rem', height: '58rem', objectFit: 'cover' }">
        <!-- </a> -->
      </div>

      <div class="info-peli">
        <div class="titulo-pelicula">
          <h1>{{ pelicula.titulo }}</h1>
          <div class="hora">
            <p>Hora seleccionada: <strong>{{ hora }}</strong></p>
          </div>
        </div>

        <div class="categorias">
          <p>Comedia, acción, animación</p>
        </div>

        <div class="edad">
          <p>+ {{ pelicula.restriccion_edad }}</p>
        </div>

        <div class="descripcion-peli">
          <p>{{ pelicula.descripcion }}</p>
        </div>

        <div class="botones-pelicula">
          <div class="ver-ya">
            <button>VER YA</button>
            <!-- <a :href="`https://Smoothpre.com/embed/${pelicula.id}`"> -->
              <div class="play-button"></div>
            <!-- </a> -->
          </div>
          <div class="otros-botones">
            <div class="trailer">
              <button>Trailer</button>
            </div>
            <div class="heart">
            </div>
          </div>
        </div>
      </div>

      <div class="detalles">
        <div class="titulo-detalles">
          <h1>DETALLES</h1>
        </div>
        <div class="texto-detalles">
          <h2>{{ pelicula.titulo }}</h2>
          <p>{{ pelicula.descripcion }}</p>
          <h4>Género</h4>
          <p>Comedia, acción, animación</p>
          <h4>Fecha de estreno</h4>
          <p>{{ pelicula.fecha_estreno }}</p>
          <h4>{{ pelicula.calificacion }}/10</h4>
          <p>Edad: + {{ pelicula.restriccion_edad }}</p>
        </div>
      </div>

      <div class="reparto">
        <div class="titulo-reparto">
          <h1>REPARTO</h1>
        </div>
        <div class="actores">
          <!-- <p v-for="actor in pelicula.actores" :key="actor.id">{{ actor.nombre }}</p> -->
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from 'axios';
  export default {
    data() {
      return {
        peliculas: [],
      };
    },
    created() {

    axios.get(`/pelicula/${id}`)
      .then(response => {
        this.pelicula = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
  };
  </script>

  <style scoped>

  </style>
