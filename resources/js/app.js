import './bootstrap';

import {createApp} from 'vue';

import film from './components/Film.vue';
// import scroll from './components/Scroll.vue';
import UsuarioUpdate from './components/usuarioUpdate.vue';
import PeliculasCRUD from './components/peliculasCRUD.vue';
import eventosCRUD from './components/eventosCRUD.vue';

const app = createApp({});

app.component('film', film);
// app.component('scroll', scroll);
app.component('usuario-update', UsuarioUpdate);
app.component('peliculas-crud', PeliculasCRUD);
app.component('eventos-crud', eventosCRUD);

app.mount('#app');
