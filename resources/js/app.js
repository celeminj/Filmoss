import './bootstrap';

import {createApp} from 'vue';

import film from './components/Film.vue';
// import scroll from './components/Scroll.vue';
import UsuarioUpdate from './components/usuarioUpdate.vue';

const app = createApp({});

app.component('film', film);
// app.component('scroll', scroll);
app.component('usuario-update', UsuarioUpdate);
app.mount('#app');
