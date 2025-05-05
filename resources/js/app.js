import './bootstrap';
import 'gsap';
import {createApp} from 'vue';
import PrimeVue from 'primevue/config';

import film from './components/Film.vue';
import scroll from './components/Scroll.vue';
import UsuarioUpdate from './components/usuarioUpdate.vue';
import peliculasNuevasCRUD from './components/peliculasNuevasCRUD.vue';
import eventosCRUD from './components/eventosCRUD.vue';
import peliculasCRUD from './components/peliculasCRUD.vue';
import mapa from './components/map.vue';
import cinesCRUD from './components/cinesCRUD.vue';
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
import EscanearQR from './components/QR/escanearQR.vue';
import GenerarQR from   './components/QR/generarQR.vue';
import categoriaYahasvisto from './components/categoria-yahasvisto.vue';
import categoriaTesorpendera from './components/categoria-tesorpendera.vue';
import categoriaNovedades from './components/categoria-novedades.vue';
import catalogoDestacanseguntusgustos from './components/catalogo-destacanseguntusgustos.vue';
import metodoPago from './components/metodoPago.vue';
import chat from './components/chat.vue';
import estadisticasPelis from './components/estadisticasPelis.vue';
import perfil from './components/perfil.vue';
import horapeli from './components/horapeli.vue';

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
app.component('categoria-crud', categoriaCURD)
app.component('categorias', categoria);
app.component('animation-catalogo', animationCatalogo);
app.component('peliculas-recientemente', peliculasRecientemente);
app.component('estadisticas', Estadisticas);
app.component('estadisticas-pelis', estadisticasPelis);
app.component('escanearqr', EscanearQR);
app.component('generarqr', GenerarQR);
app.component('categoria-yahasvisto', categoriaYahasvisto);
app.component('categoria-tesorpendera', categoriaTesorpendera);
app.component('categoria-novedades', categoriaNovedades);
app.component('catalogo-destacanseguntusgustos', catalogoDestacanseguntusgustos);
app.component('metodo-pago', metodoPago);
app.component('chat', chat);
app.component('perfil', perfil);
app.component('boton-wait', horapeli);
app.mount('#app');






