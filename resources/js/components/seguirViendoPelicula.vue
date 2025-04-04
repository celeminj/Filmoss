  <template>
      <h4>Sigue por donde lo dejaste</h4>
    <div class="seguir-viendo">

      <div class="seguir-viendo-peli">
        <div
          class="seguir-viendo-peli1"
          :style="{
            backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${peliculas[0]?.image})`,
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            backgroundRepeat: 'no-repeat'
          }"
        >
          <p>{{ peliculas[0]?.titulo }}</p>
        </div>
      </div>

      <!-- Contenedor Derecho en Columnas -->
      <div class="pelis-container">
        <div class="seguir-viendo-peli2"
             v-for="(pelicula, index) in ultimasPeliculas"
             :key="index"
             :style="{
                backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                backgroundRepeat: 'no-repeat'
              }"
        >
          <p>{{ pelicula.titulo }}</p>
        </div>
      </div>
    </div>
  </template>

  <script>
  import axios from "axios";

  export default {
    data() {
      return {
        peliculas: [],
      };
    },
    computed: {
    ultimasPeliculas() {
      return this.peliculas.slice(-3);
    }
  },
    created() {
      axios
        .get("pelicula")
        .then((response) => {
          this.peliculas = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    }
  };
  </script>

  <style scoped>

.seguir-viendo {
    display: flex;
    margin-bottom: 50px;
    margin-top: 100px;
    margin-left: 250px;
}

.seguir-viendo-peli {
    display: flex;
    flex-direction: column;
}

.seguir-viendo-peli1 {
    width: 700px;
    height: 480px;
    background-color: #2EBFA5;
    border-radius: 10px;
}
.seguir-viendo-peli1 p {
    color: #2EBFA5;
    text-transform: uppercase;
    font-size: 25px;
    padding: 10px;
    font-weight: bold;
    text-align: start;
    margin-top: 400px;
    margin-left: 20px;
}
.pelis-container {
    display: flex;
    flex-direction: column;
    margin-left: 20px;
}

.seguir-viendo-peli2 {
    width: 700px;
    height: 230px;
    border-radius: 10px;
    margin-bottom: 20px;
}
.seguir-viendo-peli2 p {
    color: #2EBFA5;
    text-transform: uppercase;
    font-size: 25px;
    padding: 10px;
    font-weight: bold;
    text-align: start;
    margin-top: 160px;
    margin-left: 20px;
}
  </style>
