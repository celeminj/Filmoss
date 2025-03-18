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

            <div class="hora-film">
                <a href="ticket">10:00</a>
                <a href="ticket">11:00</a>
                <a href="ticket">12:30</a>
                <a href="ticket">15:00</a>
                <a href="ticket">18:00</a>
            </div>
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

.film-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 15px;
    text-align: center;
}

.film-title {
    font-size: 52px;
    font-weight: bold;
    margin-bottom: 10px;
}

.film-description {
    font-size: 14px;
    margin-bottom: 10px;
    font-family: Arial, Helvetica, sans-serif;
}

.hora-film {
    display: flex;
    gap: 5px;
    margin-top: 10px;
}

.hora-film a {
    margin-top: 20px;
    width: 100%;
    background-color: #2EBFA5;
    color: white;
    padding: 5px 10px;
    border-radius: 10px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;

}

.hora-film a:hover {
    background-color:  #29cfb1;
}

.cartelera-dia{
    color: #EAD2AC;
    font-size: 100px;
    padding-left: 20%;
}

</style>
