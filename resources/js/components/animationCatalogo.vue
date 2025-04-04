<template>
    <div class="foto-principal">
      <div class="degradado-foto-catalogo">
        <div class="carrusel">
          <div
            class="interior-foto"
            :style="{
              backgroundImage: `url(${peliculas[indiceActual]?.image})`,
              backgroundSize: 'cover',
              backgroundRepeat: 'no-repeat',
              backgroundPosition: 'center'
            }"
          >
            <div class="botones-foto">
              <button class="flecha-siguiente-peli-foto" @click="cambiarImagen(-1)">
                <p>&#10094;</p>
              </button>
              <div class="titulo-peli-catalogo">
                <h1>{{ peliculas[indiceActual]?.titulo }}</h1>
              </div>
              <div class="descripcion-peli-catalogo">
                <p>{{ peliculas[indiceActual]?.descripcion }}</p>
              </div>
              <button class="flecha-anterior-peli-foto" @click="cambiarImagen(1)">
                <p>&#10095;</p>
              </button>
            </div>
          </div>
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
        indiceActual: 0,
      };
    },
    created() {
      axios.get("pelicula")
        .then(response => {
          this.peliculas = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    methods: {
      cambiarImagen(direccion) {
        if (this.peliculas.length === 0) return;
        this.indiceActual = (this.indiceActual + direccion + this.peliculas.length) % this.peliculas.length;
      },
    },
  };
  </script>

  <style scoped>
  .foto-principal {
    margin-top: 100px;
  }
  </style>
