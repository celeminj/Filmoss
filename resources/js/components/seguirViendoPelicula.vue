<template>
    <div class="seguir-viendo">
            <h4>Sigue por donde lo dejaste</h4>
            <div class="contenedor-seguir-viendo">
                <div class="seguir-viendo-peli">
                    <div class="seguir-viendo-peli1" v-for="pelicula in peliculas" :key="pelicula.id"
  :style="{
    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
    backgroundSize: 'cover',
    backgroundPosition: 'center',
    backgroundRepeat: 'no-repeat'
  }">
 <p>{{ pelicula.titulo }}</p>
                    </div>
                    <div class="seguir-viendo-peli2" v-for="pelicula in peliculas" :key="pelicula.id"
  :style="{
    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
    backgroundSize: 'cover',
    backgroundPosition: 'center',
    backgroundRepeat: 'no-repeat'
  }">
 <p>{{ pelicula.titulo }}</p>

                    </div>

                </div>
                <div class="seguir-viendo-pelis">
                    <div class="seguir-viendo-pelis-1" v-for="pelicula in peliculas" :key="pelicula.id"
  :style="{
    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
    backgroundSize: 'cover',
    backgroundPosition: 'center',
    backgroundRepeat: 'no-repeat'
  }">
 <p>{{ pelicula.titulo }}</p>

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
      };
    },
    created() {
      axios.get('pelicula')
        .then(response => {
          this.peliculas = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
  };
  </script>

  <style scoped>

  </style>
