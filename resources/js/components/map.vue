<template>
    <h1>CINES</h1>
    <!-- <div class="text-primary" id="cines">
      <div
        class="card-cines"
        v-for="cine in cines"
        :key="cine.id"
        :style="{
          backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${cine.image})`,
          backgroundSize: 'cover',
          backgroundPosition: 'center'
        }"
      >
        <h2>{{ cine.nombre }}</h2>
      </div>
    </div> -->
    <div ref="mapContainer" class="map-container"></div>
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
            zoom: 14,
        });
        this.getCines();
    },
    methods: {
        async getCines() {
            try {
                const response = await axios.get('cine/');
                this.cines = response.data;
                //   this.initMap();
                this.addMarkersToMap();
            } catch (error) {
                console.log(error);
            }
        },
        initMap() {


            // this.map.on('load', () => {

            //     //   this.map.resize();
            //     this.addMarkersToMap();
            // });
        },
        addMarkersToMap() {
            this.cines.forEach(cine => {
                new mapboxgl.Marker()
                    .setLngLat([cine.longitud, cine.latitud])
                    .addTo(this.map);
            });
        },
    },
};
</script>

<style scoped>
#cines {
    margin-top: 15rem;
    display: flex;
    justify-content: space-evenly;
    flex-wrap: wrap;
    gap: 2rem;
    color: #EAD2AC;
    cursor: pointer;
}

.card-cines h2 {
    font-size: 3rem;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    margin: 0;
    padding: 0;
}

.card-cines {
    width: 300px;
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
}

.card-cines:hover {
    color: #2EBFA5;
    transform: scale(1.02);
}

.map-container {
    margin-top: 5rem;
    height: 500px;
    width: 100%;
    position: relative;
    z-index: 0;
}
</style>
