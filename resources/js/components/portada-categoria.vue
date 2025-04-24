<template>
    <div class="porque-has-visto-interior" v-if="ultimasPeliculas.length > 0">
        <div v-for="(pelicula, index) in ultimasPeliculas" :key="index">

            <a :href="`/public/pelicula/${pelicula.id}`" style="text-decoration: none; color: inherit">
                <div v-if="index === 0" class="porque-has-visto-1" :style="{
                    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                }">
                    <div class="titulo-peli1">
                        <h3>{{ pelicula.titulo }}</h3>
                    </div>
                    <div class="duracion-peli1">
                        <h5>{{ pelicula.duracion }} min</h5>
                    </div>
                    <div class="restriccion-edad">
                        <p>+{{ pelicula.restriccion_edad }}</p>
                    </div>
                </div>

                <div v-else class="porque-has-visto-3" :style="{
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
.porque-has-visto-interior {
    gap: 1rem;
}

.restriccion-edad {
    background-color: #1f1e24;
    width: 50px;
    height: 50px;
    margin-top: 245px;
    margin-left: 20px;
    border-radius: 50%;
}

.restriccion-edad p {
    color: #ead2ac;
    text-align: center;
    font-weight: 700;
    font-size: 1.5rem;
    padding-top: 7px;
}

.porque-has-visto-1 {
    width: 800px;
    height: 350px;
    color: #2EBFA5;
    border-radius: 10px;
    display: flex;
    text-transform: uppercase;
    justify-content: right;
    align-items: center;
    padding: 3.5rem;
    font-family: "Poppins";
    font-weight: 800;
    font-size: 20px;
    margin-left: 250px;
    transition: transform 0.4s ease-in-out;
}

.titulo-peli1 {
    font-size: 2rem;
    font-weight: 700;
    text-align: center;
    margin-top: 250px;
}

.duracion-peli1 {
    font-size: 1.5rem;
    font-weight: 700;
    text-align: center;
    color: #ead2ac;
    margin-top: 250px;
    padding-left: 20px;
}

.porque-has-visto-1:hover {
    transform: scale(1.02);
}

.porque-has-visto-3 {
    flex: 1;
    height: 350px;
    text-transform: uppercase;
    padding: 0.5rem;
    color: #2EBFA5;
    border-radius: 10px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    text-align: center;
}
</style>
