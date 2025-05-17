<template>
    <div class="has-visto-interior" v-if="ultimasPeliculas.length > 0">
        <div v-for="(pelicula, index) in ultimasPeliculas" :key="index">

            <a :href="`/public/pelicula/${pelicula.id}`" style="text-decoration: none; color: inherit">
                <div v-if="index === 0" class="has-visto-1" :style="{
                    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                }">
                    <div>
                        <h3>{{ pelicula.titulo }}</h3>
                    </div>
                </div>

                <div v-else class="has-visto-1" :style="{
                    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                }">
                    <h3>{{ pelicula.titulo }}</h3>
                </div>
            </a>

        </div>
    </div>
</template>


<script>
import axios from 'axios';
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
            return this.peliculas.slice(-5);
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
.has-visto-interior {
    display: flex;
    margin-left: 180px;
}

.has-visto-1 {
    color: #2ebfa5;
    width: 260px;
    text-transform: uppercase;
    height: 350px;
    padding: 5px;
    text-align: center;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Poppins";
    font-weight: 800;
    font-size: 20px;
    margin-left: 20px;
    margin-top: 10px;
    margin-bottom: 10px;
    transition: transform 0.4s ease-in-out;
}

.has-visto-1:hover {
    transform: scale(1.05);
}
</style>
