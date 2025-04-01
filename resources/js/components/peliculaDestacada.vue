<template>
    <div class="peliculas-destacadas">
      <h4>Películas destacadas</h4>
      <div class="pelis-destacadas">
        <a class="url-peli" v-for="pelicula in peliculas" :key="pelicula.id" :href="`/Filmoss/public/pelicula/${pelicula.id}`">

          <div
            class="destacada1"
            :style="{
              backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
              backgroundSize: 'cover',
              backgroundPosition: 'center',
              backgroundRepeat: 'no-repeat'
            }"
          >
            <p>{{ pelicula.titulo }}</p>
          </div>
        </a>
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
.url-peli{
    text-decoration : none;
}
  .peliculas-destacadas h4 {
    text-align: left;
    margin-bottom: 20px;

  }

  .pelis-destacadas {
  display: flex;

  justify-content: flex-start;
  justify-content: center;
  gap: 20px;

}

.pelis-destacadas p{
    text-align: center;
}

  .destacada1 {
    width: 300px;
    height: 200px;
    border-radius: 10px;
    padding: 10px 20px;
    font-weight: bold;
    color: #2EBFA5;
    display: flex;
    cursor: pointer;
    transition: all .5s;
  }
  .destacada1:hover{
    transform: scale(1.1);

  }
  .destacada1 p{
    font-family: "Poppins";
    font-weight: 700;
    text-transform: uppercase;
    font-size: 20px;
    margin-top: 150px;
}
  </style>
