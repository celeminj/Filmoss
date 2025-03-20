import './bootstrap';

import {createApp} from 'vue';

import film from './components/Film.vue';
// import scroll from './components/Scroll.vue';

const app = createApp({});

app.component('film', film);
// app.component('scroll', scroll);

app.mount('#film');
// app.mount('#scroll');
