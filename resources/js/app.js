import './bootstrap';

import {createApp} from 'vue';

import film from './components/Film.vue';
import scroll from './components/Scroll.vue';
import UsuarioUpdate from './components/usuarioUpdate.vue';
import peliculasNuevasCRUD from './components/peliculasNuevasCRUD.vue';
import eventosCRUD from './components/eventosCRUD.vue';
import peliculasCRUD from './components/peliculasCRUD.vue';
import mapa from './components/map.vue';
const app = createApp({});

app.component('film', film);
app.component('scroll', scroll);
app.component('usuario-update', UsuarioUpdate);
app.component('peliculas-crud', peliculasNuevasCRUD);
app.component('pelicula-crud', peliculasCRUD);
app.component('eventos-crud', eventosCRUD);
app.component('mapa', mapa);

app.mount('#app');
