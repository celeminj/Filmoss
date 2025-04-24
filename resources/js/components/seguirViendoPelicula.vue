<template>
    <h4>Sigue por donde lo dejaste</h4>
    <div class="seguir-viendo">

        <div v-if="peliculas.length > 0">
            <a class="seguir-viendo-peli" :href="`/public/pelicula/${peliculas[0].id}`">
                <div class="seguir-viendo-peli1" :style="{
                    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${peliculas[0].image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                }">
                    <p>{{ peliculas[0].titulo }}</p>
                </div>
            </a>
            <a class="seguir-viendo-links" :href="`/public/pelicula/${peliculas[1].id}`">
                <div class="seguir-viendo-peli2" :style="{
                    backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${peliculas[1].image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                }">
                    <p>{{ peliculas[1].titulo }}</p>
                </div>
            </a>
        </div>

        <div class="pelis-container">
            <a v-for="(pelicula, index) in ultimasPeliculas" :key="index" :href="`/public/pelicula/${pelicula.id}`"
                class="seguir-viendo-link">
                <div class="seguir-viendo-peli2" :style="{
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
import * as bootstrap from 'bootstrap';
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

.seguir-viendo-links {
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
    transition: all .5s;
}

.seguir-viendo-links:hover {
    transform: scale(1.04);
}

.seguir-viendo-peli {
    display: flex;
    flex-direction: column;
    text-decoration: none;
    transition: all .5s;
}

.seguir-viendo-peli:hover {
    transform: scale(1.05);
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
    padding-top: 400px;
    margin-left: 20px;

}

.pelis-container {
    display: flex;
    flex-direction: column;
    margin-left: 20px;

}

.seguir-viendo-link {
    text-decoration: none;
    display: inline-block;
    width: 100%;
}

.seguir-viendo-peli2 {
    width: 700px;
    height: 230px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.seguir-viendo-peli2:hover {
    transform: scale(1.05);
}

.seguir-viendo-peli2 p {
    color: #2EBFA5;
    text-transform: uppercase;
    font-size: 25px;
    padding: 10px;
    font-weight: bold;
    text-align: start;
    padding-top: 180px;
    margin-left: 20px;
}

.seguir-viendo-peli3 {
    width: 700px;
    height: 230px;
    background-color: #2EBFA5;
    border-radius: 10px;
}
</style>
