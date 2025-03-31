<template>
  
   <div class="container-fluid">
    <div class="cartelera-dia"><strong>EVENTO</strong></div>
    
    <ul class="paginas-nav">
            <li><a id="len1" class="hoverable">Lunes</a></li>
            <li><a id="len2" class="hoverable">Martes</a></li>
            <li><a id="len3" class="hoverable">Miercoles</a></li>
            <li><a id="len4" class="hoverable">Jueves</a></li>
            <li><a id="len4" class="hoverable">Viernes</a></li>
            <li><a id="len4" class="hoverable">Sabado</a></li>
            <li><a id="len4" class="hoverable">Domingo</a></li>
        </ul>
   </div>
   <div class="cartelera-dia"><strong>LUNES</strong></div>

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

            <div id="hora-film">
                <a v-for="horario in horarios" :key="horario" :href="esHorarioDisponible(horario) ? `ticket/${pelicula_nueva.id}/${horario}` : '#'"
                :class="{ 'disabled': !esHorarioDisponible(horario) }">
                {{ horario }}
                </a>
            </div>

        </div>

    </div>

</template>
<script>
export default {
        data() {
            return {
                peliculas_nuevas: [],
                peliculas_filtradas: [],
                horarios: ["10:00", "11:00", "12:00", "15:00", "18:00","20:00"]
                 };
            },
            created() {
                    const me = this;
                    axios.get('pelicula_nueva')
                    .then(response => {
                        me.peliculas_nuevas = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },
        computed: {
                    horaActual() {
                        const fechaInicio = new Date();
                        return fechaInicio.getHours();
                    }
                    },
        methods: {

            esHorarioDisponible(horario){
                const horaHorario  =parseInt(horario.split(":")[0]);
                return horaHorario > this.horaActual;
            },
            redirigirATicket(horario){
                if (this.esHorarioDisponible(horario)) {
                    this.$router.push({ name: "ticket", params: { hora: horario } });
            }
                },
            }

    }
</script>
<style >

.disabled {
    pointer-events: none;
    opacity: 0.8;
    cursor: not-allowed;
}

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


@media screen and (max-width: 48rem) {
    .cartelera-film {
        max-width: 95%;
        padding: 1rem;
        text-align: center;
    }

    .film-title {
        font-size: 2rem;
    }

    #hora-film {
        flex-direction: column;
        align-items: center;
    }

    #hora-film a {
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

#hora-film {
    display: flex;
    gap: 5px;
    margin-top: 10px;
}

#hora-film a {
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

#hora-film a:hover {
    background-color:  #19e0bc;
}

.cartelera-dia{
    color: #EAD2AC;
    font-size: 100px;
    padding-left: 20%;
}

</style>
