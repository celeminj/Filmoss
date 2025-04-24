<template>
    <div class="carrusel-categoria">
        <h1>Te sorprenderán</h1>

        <div class="carrusel-coverflow">
            <div v-for="(pelicula, index) in peliculas" :key="pelicula.id" class="slide" :class="{
                active: index === currentIndex,
                prev: index === currentIndex - 1,
                next: index === currentIndex + 1
            }" :style="{
    backgroundImage: `linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url(${pelicula.image})`
}" @click="irAPelicula(index)">
                <a :href="`/public/pelicula/${pelicula.id}`" @click.stop style="text-decoration: none; color: inherit;">
                    <h3>{{ pelicula.titulo }}</h3>
                </a>
            </div>

        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
import axios from 'axios'

const props = defineProps({
    idCategoria: {
        type: Number,
        required: true
    }
})

const peliculas = ref([])
const currentIndex = ref(0)

const cargarPeliculas = async () => {
    try {
        const response = await axios.get(`/categorias/${props.idCategoria}/peliculas`)
        peliculas.value = response.data.slice(-5)
        currentIndex.value = 0
    } catch (error) {
        console.error(error)
    }
}

onMounted(cargarPeliculas)
watch(() => props.idCategoria, cargarPeliculas)

const irAPelicula = (index) => {
    if (index >= 0 && index < peliculas.value.length) {
        currentIndex.value = index
    }
}
</script>

<style scoped>
.carrusel-categoria {
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 40px 0;
    text-align: center;
}

.carrusel-categoria h1 {
    color: #ead2ac;
    text-transform: uppercase;
    font-size: 90px;
    margin-bottom: 40px;
}

.carrusel-coverflow {
    position: relative;
    height: 600px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.slide {
    position: absolute;
    width: 75%;
    height: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 20px;
    transition: all 0.5s ease;
    cursor: pointer;
    opacity: 0;
    transform: scale(0.7);
    z-index: 0;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding: 20px;
}

.slide h3 {
    text-transform: uppercase;
    font-size: 50px;
    color: #2EBFA5;
    text-shadow: 2px 2px 5px black;
}

.slide.active {
    opacity: 1;
    transform: scale(1);
    z-index: 2;
}

.slide.next {
    opacity: 0.5;
    transform: translateX(60%) scale(0.8);
    z-index: 1;
}

.slide.prev {
    opacity: 0.5;
    transform: translateX(-60%) scale(0.8);
    z-index: 1;
}
</style>
