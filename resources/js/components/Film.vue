<template >
    <div class="cartelera-fluid">
        <div class="cartelera-film" v-for="pelicula_nueva in peliculas_nuevas " :key="pelicula_nueva.id"  :style="{
         background: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${pelicula_nueva.image})` }">

            <div class="film-title">
             {{ pelicula_nueva.titulo}}
            </div>
            <ul>
                <li>{{ pelicula_nueva.duracion + " Min" }}</li>
                <li>{{"+" + pelicula_nueva.restriccion_edad}}</li>
                <li>{{ pelicula_nueva.calificacion + "/10" }}</li>
            </ul>
            <p>{{pelicula_nueva.descripcion}}</p>

            <ul class="hora-film">
                <a href="">10:00</a>
                <a href="">11:00</a>
                <a href="">12:30</a>
                <a href="">15:00</a>
                <a href="">18:00</a>
            </ul>
        </div>

    </div>

</template>
<script>
export default {
    data() {
        return {
            peliculas_nuevas: [],
            peliculas_filtradas: []
        };
    },
    mounted(){
        fetch("http://localhost/Filmoss/public/pelicula_nueva")
      .then(response => response.json())
      .then(data => {
        this.peliculas_nuevas = data;
      })
      .catch(error => console.error("Error cargando datos:", error));
        }
    }

</script>
<style >

.cartelera-fluid{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.cartelera-film {
    width: 100%;
    max-width: 1200px;
    height: auto;
    margin:20px;
    padding: 1rem;
    overflow: hidden;
    align-items: center;
    border-radius: 1rem;
    box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.2);
    color: rgb(255, 255, 255);
    background-size: cover;
    background-position: center;
}

/* Estilos para móviles */
@media screen and (max-width: 48rem) {
    .cartelera-film {
        max-width: 95%;
        padding: 1rem;
        text-align: center;
    }

    .film-title {
        font-size: 2rem;
    }

    .hora-film {
        flex-direction: column;
        align-items: center;
    }

    .hora-film a {
        width: 80%;
        font-size: 1rem;
    }
}
</style>
