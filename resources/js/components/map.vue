<template>
    <div class="titulo-cines">
        <h1>CINES</h1>
    </div>
    <div class="contenedor">
        <div class="text-primary" id="cines">
            <div class="card-cines" v-for="cine in cines" :key="cine.id" @click="posicionarCine(cine)" :style="{
                backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${cine.image})`,
                backgroundSize: 'cover',
                backgroundPosition: 'center'
            }">
                <h2>{{ cine.nombre }}</h2>
            </div>
        </div>
        <div ref="mapContainer" class="map-container"></div>

    </div>
</template>

<script>
import mapboxgl from 'mapbox-gl';
import axios from 'axios';

export default {
    name: 'MapboxMap',
    data() {
        return {
            cines: [],
            map: null,
        };
    },
    mounted() {
        mapboxgl.accessToken = 'pk.eyJ1IjoiZWxjZWxlIiwiYSI6ImNtOHJqaGIzNzA2a2kya3B2azlubmZpd2YifQ.SoaN9qTdXQZvsNybR3DQIw';
        this.map = new mapboxgl.Map({
            container: this.$refs.mapContainer,
            style: 'mapbox://styles/mapbox/navigation-night-v1',
            center: [2.055501, 41.357301],
            zoom: 16,
        });
        this.getCines();
    },
    methods: {
        async getCines() {
            try {
                const response = await axios.get('cine/');
                this.cines = response.data;
                this.addMarkersToMap();
            } catch (error) {
                console.log(error);
            }
        },
        addMarkersToMap() {
            this.cines.forEach(cine => {
                new mapboxgl.Marker()
                    .setLngLat([cine.longitud, cine.latitud])
                    .addTo(this.map);
            });
        },
        posicionarCine(cine) {
            this.map.flyTo({
                center: [cine.longitud, cine.latitud],
                zoom: 16,
                speed: 0.8,
                curve: 1,
                easing(t) {
                    return t;
                },
            });
        },
    },
};
</script>

<style scoped>
.titulo-cines{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 5rem;
    color: #EAD2AC;
    font-size: 2rem;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 2rem;
    margin-top: 9rem;
}
#cines {
    margin-top: 5rem;
    display: flex;
    flex-wrap: wrap;
    color: #EAD2AC;
}

.card-cines h2 {
    font-size: 1.6rem;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    margin: 0;
    padding: 0;
}

.card-cines {
    cursor: pointer;
    width: 200px;
    height: 200px;
    color: #EAD2AC;
    border-radius: 20px;
    position: relative;
    overflow: hidden;
    background-color: #222;
    transition: transform 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    margin-left: 20px;
}

.card-cines:hover {
    color: #2EBFA5;
    transform: scale(1.02);
}

.contenedor {
    display: flex;
    justify-content: flex-end;
}

.map-container {
    margin-top: 5rem;
    height: 600px;
    width: 60%;
    border-radius: 20px;
    box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
    position: relative;
    z-index: 0;
    margin-right: 30px;
    }
</style>
