<template>
    <div class="perfil" v-if="usuario">
        <img src="https://i.postimg.cc/ZKjxw3XV/al-pacino-dans-une-scene-du-film-scarface-1.png" alt=""
            class="imagen-perfil">
        <div class="linea-vertical"></div>
        <div class="contenido-texto">
            <h1>Perfil: {{ usuario.nombre }}</h1>
            <p>Perfil de filmo para ver las películas vistas y tremendas películas que hay para ver, madre mía no tienes
                tiempo para tanta película.</p>
        </div>
    </div>
    <div class="peliculas-vistas">
        <h1>Peliculas vistas</h1>
        <div class="pelis-destacadas">
            <a class="url-peli" v-for="(pelicula, index) in ultimasPeliculas" :key="index"
                :href="`/public/pelicula/${pelicula.id}`">

                <div class="destacada1" :style="{
                    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${pelicula.image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                }">
                    <p>{{ pelicula.titulo }}</p>
                </div>
            </a>
        </div>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    props: {
        idUsuario: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            usuario: null,
            peliculas: []
        }
    },
    computed: {
        ultimasPeliculas() {
            return this.peliculas.slice(-5);
        }
    },
    mounted() {
        this.obtenerPerfil()
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
    methods: {
        obtenerPerfil() {
            axios.get(`usuario/${this.idUsuario}`)
                .then(response => {
                    this.usuario = response.data
                })
                .catch(error => {
                    console.error('Error al obtener perfil con Axios:', error)
                })
        },
        obtenerPelisculasVistas() {
            axios.get(`usuario/${this.idUsuario}/peliculas`)
                .then(response => {
                    this.peliculas = response.data
                })
                .catch(error => {
                    console.error('Error al obtener peliculas vistas:', error)
                })
        }
    }
}
</script>



<style scoped>
.linea-vertical {
    width: 2px;
    height: 200px;
    margin-left: 20px;
    margin-right: 40px;
    background-color: white;
}

.perfil {
    margin-top: 200px;
    margin-left: 200px;
    padding: 20px;
    border-radius: 5px;
    color: #EAD2AC;
    font-family: "Poppins";
    display: flex;
    align-items: flex-start;
}

.imagen-perfil {
    width: 200px;
    height: 200px;
    margin-left: 50px;
    margin-right: 60px;
}

.contenido-texto {
    display: flex;
    flex-direction: column;
}

.contenido-texto h1 {
    margin-top: 50px;
    font-size: 28px;
}

.contenido-texto p {
    margin-top: 10px;
    color: #ffffff;
}


.peliculas-vistas {
    margin-top: 150px;
    padding: 20px;
    text-align: center;
    text-transform: uppercase;
    color: #2EBFA5;
    font-family: "Poppins";
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.756);
}

.url-peli {
    text-decoration: none;
}

.pelis-destacadas {
    display: flex;
    justify-content: flex-start;
    justify-content: center;
    gap: 20px;
}

.pelis-destacadas p {
    text-align: center;
}

.destacada1 {
    margin-top: 70px;
    width: 300px;
    height: 400px;
    border-radius: 10px;
    padding: 20px 50px;
    font-weight: bold;
    color: #2EBFA5;
    display: flex;
    cursor: pointer;
    transition: all .5s;
}

.destacada1:hover {
    transform: scale(1.1);

}


.destacada1 p {
    font-family: "Poppins";
    font-weight: 700;
    text-transform: uppercase;
    font-size: 30px;
    margin-top: 150px;
}
</style>
