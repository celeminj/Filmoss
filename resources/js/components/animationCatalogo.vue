<template>
  <div class="foto-principal">
    <button class="flecha-siguiente-peli-foto" @click="cambiarImagen(-1)">
          <p>&#10094;</p>
        </button>
    <a class="pelicula-url" :href="`/public/pelicula/${peliculas[indiceActual]?.id}`">
      <div
        class="interior-foto"
        :style="{
          backgroundImage: `url(${peliculas[indiceActual]?.image})`,
          backgroundSize: 'cover',
          backgroundRepeat: 'no-repeat',
          backgroundPosition: 'center'
        }"
      >

        <div class="titulo-peli-catalogo">
          <h1>{{ peliculas[indiceActual]?.titulo }}</h1>
        </div>
        <div class="descripcion-peli-catalogo">
          <p>{{ peliculas[indiceActual]?.descripcion }}</p>
        </div>

      </div>
    </a>
    <button class="flecha-anterior-peli-foto" @click="cambiarImagen(1)">
          <p>&#10095;</p>
        </button>
  </div>
</template>
  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        peliculas: [],
        indiceActual: 0,
       intervalo: null,
      };
    },
    mounted(){
      this.iniciarCarrusel();
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
      iniciarCarrusel(){
        this.intervalo = setInterval(() => {
          this.cambiarImagen(1);
        }, 6000);
      }
    },
  };
  </script>

  <style scoped>
.pelicula-url{
text-decoration: none;
}
.foto-principal{
    width: 90vw;
    color: #00ffdd;
    height: 600px;
    margin: 100px 85px;
}

.flecha-siguiente-peli-foto{
    width: 25px;
    height: 25px;
    background: linear-gradient(to right, #00ffdd, rgba(255, 255, 255, 0.2));
    border-radius: 50px;
    position: absolute;
    top: 58%;
    left: 3.2%;
    border: none;
}

.flecha-anterior-peli-foto{
    width: 25px;
    height: 25px;
    background: linear-gradient(to left, #00ffdd, rgba(255, 255, 255, 0.2));
    border-radius: 50px;
    position: absolute;
    top: 58%;
    left: 87.5%;
    border: none;
}

.flecha-siguiente-peli-foto{
    margin: -115px -20px;
}

.flecha-anterior-peli-foto{
    margin: -110px 160px;
}

.interior-foto {
  height: 700px;
  width: 100%;
  padding: 100px 50px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  position: relative;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  box-sizing: border-box;
}

.titulo-peli-catalogo{
    margin-top: 200px;
    margin-bottom: 50px;
}

.titulo-peli-catalogo h1{
    text-transform: uppercase;
    font-weight: 800;
    color:#2EBFA5;
    margin-left: 77px;
}

.descripcion-peli-catalogo{
    width: 500px;
    color:#2EBFA5;
    margin-left: 80px;
}

.peliculas-foto-catalogo{
    height: 250px;
    width: 550px;
    margin-left: auto;
    display: flex;

}

.peli-foto-catalogo{
    height: 250px;
    width: 170px;
    background-color: #2EBFA5;
    margin: 0px 7px;
    border-radius: 10px;
    transition: transform 0.3s;
}
  </style>
