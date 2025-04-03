<template>
    <div class="pelicula-contenedor">
   <div class="container-fluid" v-for="evento_pelicula in evento_peliculas" :key="evento_pelicula.id">
    <div class="cartelera-dia"><strong>{{evento_pelicula.titulo_evento}}</strong></div>

    <ul class="paginas-nav">
  <li v-for="dia in getWeekDays(evento_pelicula.fecha_inicio)" :key="dia">
    <button class="dia-semana"  :class="{ activo: dia === diaSeleccionado }" @click="seleccionarDia(dia)">
     <strong>{{ dia }}</strong>
    </button>
  </li>
</ul>

<div v-if="diaSeleccionado" class="detalle-dia">
  <h2 class="dia-grande"><strong>{{ diaSeleccionado }}</strong></h2>
  <p>{{ eventoDelDia }}</p>
</div>
  </div>


    <div class="cartelera-fluid">
        <div class="cartelera-film" v-for="pelicula_nueva in peliculas_nuevas " :key="pelicula_nueva.id"  :style="{
         background: `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(${pelicula_nueva.image})`, backgroundSize: 'cover',
    backgroundPosition: 'center',
    backgroundRepeat: 'no-repeat'
  }">

            <div class="film-title">
             {{ pelicula_nueva.titulo}}
            </div>
            <ul>
                <li>{{ pelicula_nueva.duracion + " Min" }}</li>
                <li>{{"+" + pelicula_nueva.restriccion_edad}}</li>
                <li>{{ pelicula_nueva.calificacion + "/10" }}</li>
            </ul>
            <p>{{pelicula_nueva.descripcion}}</p>

            <div id="hora-film" >
                <a v-for="horario in horarios" :key="horario" :href="esHorarioDisponible(horario) ? `ticket/${pelicula_nueva.id}/${horario}` : '#'"
                :class="{ 'disabled': !esHorarioDisponible(horario) }">
                {{ horario }}
                </a>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import axios from 'axios';
export default {
        data() {
            return {
                peliculas_nuevas: [],
                evento_peliculas: [],
                peliculas_filtradas: [],
                diaSeleccionado: "",
                horarios: ["10:00", "11:00", "12:00", "15:00", "18:00","20:00"],
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

                    axios.get('evento_pelicula')
                    .then(response => {
                        me.evento_peliculas = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                },

        computed: {
            eventoDelDia() {
                if (!this.diaSeleccionado || this.evento_peliculas.length === 0 || !this.evento_peliculas[0].eventos) {
                return "";
                }

                const evento = this.evento_peliculas[0].eventos[this.diaSeleccionado.toLowerCase()];
                return evento || "No hay eventos para este día.";
                    },
                    horaActual() {
                        const fechaInicio = new Date();
                        return fechaInicio.getHours();
                    },

                    },
        methods: {
                        getWeekDays(fecha_inicio) {
                const fecha = new Date(fecha_inicio);
                const lunes = new Date(fecha);
                lunes.setDate(fecha.getDate() - fecha.getDay() + 1);

                const diasSemana = [];
                for (let i = 0; i < 7; i++) {
                const dia = new Date(lunes);
                dia.setDate(lunes.getDate() + i);
                diasSemana.push(dia.toLocaleDateString("es-ES", { weekday: "long" }).toUpperCase());
                }
                return diasSemana;
            },

            seleccionarDia(dia) {
                this.diaSeleccionado = dia;
            },
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
<style>
.pelicula-contenedor{
    margin-top: 10rem;
}
.dia-grande{
    display: flex;
    justify-content: left;
    margin-top: 25px;
    color: #EAD2AC;
    font-size: 110px;
    padding-left: 20%;
}
.dia-semana{
    color: #EAD2AC;
    text-transform: uppercase;
    background: none;
    border: none;
    margin-top: 20px;
}
.dia-semana:hover{
    color: #2EBFA5;
    cursor: pointer;
}
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
    text-transform: uppercase;
}

</style>
