<template>
    <div class="novedades">
        <div class="carousel-wrapper">
            <div class="carousel" ref="carouselRef">
                <div v-for="pelicula in peliculas" :key="pelicula.id" class="novedades-1" :style="{
                    backgroundImage: `linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.5)), url(${pelicula.image})`,
                    backgroundSize: 'cover',
                    backgroundPosition: 'center',
                    backgroundRepeat: 'no-repeat'
                }">
                    <a :href="`/public/pelicula/${pelicula.id}`">
                        <h3>{{ pelicula.titulo }}</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    props: {
        idCategoria: Number
    },
    data() {
        return {
            peliculas: [],
            carouselInterval: null
        };
    },
    methods: {
        async cargarPeliculas() {
            try {
                const res = await axios.get('pelicula');
                this.peliculas = res.data.slice(-8);
            } catch (err) {
                console.error(err);
            }
        },
        iniciarCarrusel() {
            this.carouselInterval = setInterval(() => {
                const carousel = this.$refs.carouselRef;
                if (carousel) {
                    carousel.scrollBy({ left: 300, behavior: 'smooth' });
                }
            }, 3000);
        }
    },
    watch: {
        idCategoria() {
            this.cargarPeliculas();
        }
    },
    mounted() {
        this.cargarPeliculas();
        this.iniciarCarrusel();
    },
    beforeDestroy() {
        clearInterval(this.carouselInterval);
    }
};
</script>


<style scoped>
* {
    box-sizing: border-box;
}

.novedades {
    width: 100%;
    margin-top: 100px;
    padding: 0 40px;
    overflow-x: hidden;
}

.novedades h4 {
    color: #ead2ac;
    font-size: 30px;
    margin-bottom: 50px;
}

.carousel-wrapper {
    overflow: hidden;
    width: 100%;
}

.carousel {
    display: flex;
    gap: 20px;
    transition: transform 0.3s ease;
    overflow-x: auto;
    scroll-behavior: smooth;
    -ms-overflow-style: none;
    scrollbar-width: none;
}

.carousel::-webkit-scrollbar {
    display: none;
}

.novedades-1 {
    flex: 0 0 auto;
    width: 280px;
    height: 340px;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    display: flex;
    align-items: flex-end;
    justify-content: center;
    padding: 20px;
    color: #2EBFA5;
    text-transform: uppercase;
    font-weight: bold;
    transition: transform 0.3s;
}

.novedades-1 a {
    text-decoration: none;
    color: inherit;
    width: 100%;
    text-align: center;
}

.novedades-1 h3 {
    text-shadow: 2px 2px 5px black;
    color: #2EBFA5;
    font-family: "Poppins";
    font-weight: 800;
    font-size: 22px;
    text-align: center;
}
</style>
