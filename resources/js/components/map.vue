<template>
    <div class="text-primary" id="cines" v-for="cine in cines" :key="cine.id">
        <div class="card-cines">
            <h2>{{cines.nombre}}</h2>
        </div>
    </div>
    <div ref="mapContainer" class="map-container"></div>
  </template>

  <script>
  import mapboxgl from 'mapbox-gl';

  export default {
    name: 'MapboxMap',
    mounted() {
      // Aquí es donde inicializamos el mapa una vez que el componente está montado
      mapboxgl.accessToken = 'pk.eyJ1IjoiZWxjZWxlIiwiYSI6ImNtOHJqaGIzNzA2a2kya3B2azlubmZpd2YifQ.SoaN9qTdXQZvsNybR3DQIw'; // Sustituye con tu token de Mapbox
      this.map = new mapboxgl.Map({
        container: this.$refs.mapContainer, // Referencia al div donde se mostrará el mapa
        style: 'mapbox://styles/mapbox/navigation-night-v1', // Estilo del mapa, puedes elegir otro estilo
        center: [2.055501, 41.357301], // Coordenadas iniciales [longitud, latitud]
        zoom: 14, // Nivel de zoom
      });
    },
    destroyed() {
      // Limpiar cuando el componente se destruya para evitar fugas de memoria
      if (this.map) {
        this.map.remove();
      }
    },
  };
  </script>

  <style scoped>
#cines{
    display: flex;
    justify-content: center;
    color: #EAD2AC;
    justify-content:space-evenly;
    cursor: pointer;
}

.card-cines h2{
    font-size: 3rem;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    margin: 0;
    padding: 0;
}

.card-cines {
    width: 20vw;
    height: 25vh;
    color: #EAD2AC;
    border-radius: 20px;
    position: relative;
    border: none;
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
    background-image: url('https://elartevisualblog.wordpress.com/wp-content/uploads/2016/09/disney-cine-82069.gif');
}

.card-cines:hover {
    color: #2EBFA5;
    background-size: cover;
    background-position: center;
    transform: scale(1.02);
}
  .map-container {
    width: 100%;
    margin-top: 10px;
    height: 500px;
  }
  </style>
