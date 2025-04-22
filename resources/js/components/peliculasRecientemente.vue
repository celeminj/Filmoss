<template>
  <div class="peliculas-destacadas">
    <h4>Películas destacadas</h4>

    <div class="pelis-destacadas">
      <a
        class="url-peli"
        v-for="(pelicula, index) in peliculasPaginadas"
        :key="index"
        :href="`/Filmoss/public/pelicula/${pelicula.id}`"
      >
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

    <div class="pagination">
      <button @click="cambiarPagina(paginaActual - 1)" :disabled="paginaActual === 1">
        &lt;
      </button>

      <button
        v-for="n in totalPaginas"
        :key="n"
        :class="{ activo: n === paginaActual }"
        @click="cambiarPagina(n)"
      >
        {{ n }}
      </button>

      <button @click="cambiarPagina(paginaActual + 1)" :disabled="paginaActual === totalPaginas">
        &gt;
      </button>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      peliculas: [],
      paginaActual: 1,
      porPagina: 5
    }
  },
  computed: {
    ultimasPeliculas() {
      return this.peliculas.slice(-30)
    },
    totalPaginas() {
      return Math.ceil(this.ultimasPeliculas.length / this.porPagina)
    },
    peliculasPaginadas() {
      const inicio = (this.paginaActual - 1) * this.porPagina
      return this.ultimasPeliculas.slice(inicio, inicio + this.porPagina)
    }
  },
  methods: {
    cambiarPagina(pagina) {
      if (pagina >= 1 && pagina <= this.totalPaginas) {
        this.paginaActual = pagina
      }
    }
  },
  created() {
    axios.get('pelicula')
      .then(response => {
        this.peliculas = response.data
      })
      .catch(error => {
        console.log(error)
      })
  }
}
</script>

<style scoped>
.url-peli {
  text-decoration: none;
}

.peliculas-destacadas h4 {
  text-align: left;
  margin-left: 160px;
  color: #ead2ac;
  font-size: 30px;
  margin-bottom: 20px;
}

.pelis-destacadas {
  display: grid;
  grid-template-columns: repeat(5, 0.18fr);
  grid-gap: 10px;
  margin-left: 160px;
}

.pelis-destacadas p {
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
  transition: all 0.5s;
}

.destacada1:hover {
  transform: scale(1.1);
}

.destacada1 p {
  font-family: "Poppins";
  font-weight: 700;
  text-transform: uppercase;
  font-size: 20px;
  margin-top: 150px;
}

/* Paginación */
.pagination {
  margin-top: 30px;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
}

.pagination button {
  width: 38px;
  height: 38px;
  border: none;
  background-color: #2EBFA5;
  color: white;
  font-weight: bold;
  border-radius: 50%;
  cursor: pointer;
  transition: 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
}

.pagination button:hover {
  background-color: #249e8a;
}

.pagination button:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}

.pagination button.activo {
  background-color: #175f53;
}
</style>
