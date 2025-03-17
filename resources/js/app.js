import './bootstrap';
import * as bootstrap from "bootstrap";
import {createApp} from 'vue';

import film from './components/Film.vue';

const app = createApp({});

app.component('film', film);

app.mount('#film');
