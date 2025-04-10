import './bootstrap';
import 'gsap';
import {createApp} from 'vue';


import film from './components/Film.vue';
import scroll from './components/Scroll.vue';
import UsuarioUpdate from './components/usuarioUpdate.vue';
import peliculasNuevasCRUD from './components/peliculasNuevasCRUD.vue';
import eventosCRUD from './components/eventosCRUD.vue';
import peliculasCRUD from './components/peliculasCRUD.vue';
import mapa from './components/map.vue';
import cinesCRUD from './components/cinesCRUD.vue';
import categoriaFilm from './components/categoriaFilm.vue';
import navDesplegable from './components/navDesplegable.vue';
import actorCRUD from './components/actorCRUD.vue';
import PeliculaDestacada from './components/peliculaDestacada.vue';
import seguirViendoPelicula from './components/seguirViendoPelicula.vue';
import peliculas from './components/peliculas.vue';
import categoriaCURD from './components/categoriaCURD.vue';
import categoria from './components/categoria.vue';
import animationCatalogo from './components/animationCatalogo.vue';
import peliculasRecientemente from './components/peliculasRecientemente.vue';
import Estadisticas from './components/estadisticas.vue';
import portadaCategoria from './components/portada-categoria.vue';
const app = createApp({});

app.component('portada-categoria',portadaCategoria);
app.component('pelicula',peliculas)
app.component('seguir-viendo',seguirViendoPelicula);
app.component('pelicula-destacada', PeliculaDestacada);
app.component('nav-desplegable', navDesplegable);
app.component('actor-crud', actorCRUD);
app.component('film', film);
app.component('scroll', scroll);
app.component('usuario-update', UsuarioUpdate);
app.component('peliculas-crud', peliculasNuevasCRUD);
app.component('pelicula-crud', peliculasCRUD);
app.component('eventos-crud', eventosCRUD);
app.component('mapa', mapa);
app.component('cines-crud', cinesCRUD);
app.component('categoria-film', categoriaFilm);
app.component('categoria-crud', categoriaCURD)
app.component('categorias', categoria);
app.component('animation-catalogo', animationCatalogo);
app.component('peliculas-recientemente', peliculasRecientemente);
app.component('estadisticas', Estadisticas)
app.mount('#app');
