<template>
    <div class="botones-pelicula-nueva" ref="botonesContainer">
      <button
        id="verBtn"
        class="boton-pelicula"
        :disabled="!puedeVer"
        @click="verPelicula"
      >
        {{ buttonText }}
        <div class="play-button-pelicula-nueva"></div>
      </button>
      <button class="boton-pelicula trailer-btn">Trailer</button>
      <img
        class="heart-new"
        src="https://i.postimg.cc/KYb6P9qk/Heart.png"
        alt="Corazon"
      />
    </div>
  </template>

<script setup>
import { ref, onMounted, computed, onUnmounted } from 'vue'

const props = defineProps({
  peliculaId: Number,
  hora: String,
  peliculaSrc: String
})

const puedeVer = ref(false)
const tiempoRestante = ref(null)
const botonesContainer = ref(null)

const buttonText = computed(() => {
  if (puedeVer.value) return 'VER YA'

  if (tiempoRestante.value !== null) {
    const hours = Math.floor(tiempoRestante.value / 60)
    const minutes = tiempoRestante.value % 60
    return `Disponible en ${hours}h ${minutes}m`
  }

  return 'Cargando...'
})

function calcularTiempoRestante(horaProgramada) {
  const ahora = new Date()
  const [horaProg, minutoProg] = horaProgramada.split(':').map(Number)

  const horaProgramadaDate = new Date()
  horaProgramadaDate.setHours(horaProg, minutoProg, 0, 0)

  if (horaProgramadaDate <= ahora) {
    return { puedeVer: true, tiempoRestante: 0 }
  }

  const diffMs = horaProgramadaDate - ahora
  const diffMins = Math.round(diffMs / 60000)

  return {
    puedeVer: false,
    tiempoRestante: diffMins
  }
}

function verificarDisponibilidad() {
  const { puedeVer: puedeVerResult, tiempoRestante: tiempoResult } =
    calcularTiempoRestante(props.hora)

  puedeVer.value = puedeVerResult
  tiempoRestante.value = tiempoResult
}

function verPelicula() {
  if (!puedeVer.value) return

  const elementsToHide = [
    'contenedorDesaparecer',
    'titulo-pelicula',
    'descripcion-peli',
    'edad',
    'botones-pelicula-nueva'
  ]

  elementsToHide.forEach(selector => {
    const element = document.getElementById(selector) ||
                   document.querySelector(`.${selector}`)
    if (element) element.style.display = 'none'
  })

  const iframe = document.getElementById('iframePelicula')
  if (iframe) {
    iframe.src = props.peliculaSrc
    iframe.style.display = 'block'
  }
}

onMounted(() => {
  verificarDisponibilidad()
  const intervalId = setInterval(verificarDisponibilidad, 60000)

  onUnmounted(() => clearInterval(intervalId))
})
</script>

<style scoped>
.botones-pelicula-nueva {
    display: flex;
    align-items: center;
    margin-top: 150px;
    justify-content: flex-start;
    gap: 12px;
  }

  .boton-pelicula {
    background-color: #1f1e24;
    border-radius: 10px;
    color: #2ebfa5;
    padding: 10px 20px;
    font-family: "Lexend", sans-serif;
    font-weight: 700;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
    min-height: 60px;
    min-width: 120px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    font-size: 0.9rem;
  }

  .boton-pelicula:disabled {
    opacity: 1;
    cursor: not-allowed;
    color: #ff6b6b;
    background-color: #2a292e;
  }

  .boton-pelicula:hover:enabled {
    transform: scale(1.05);
    box-shadow: 0 0 15px rgba(46, 191, 165, 0.5);
  }

  .trailer-btn {
    min-width: 80px;
    min-height: 40px;
    padding: 8px 12px;
    margin-left: 20px;
    font-size: 0.8rem;
  }

  .trailer-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 10px rgba(46, 191, 165, 0.4);
  }

  .play-button-pelicula-nueva {
    width: 12px;
    height: 12px;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
    border-left: 10px solid currentColor;
    margin-left: 5px;
  }

  .heart-new {
    width: 40px;
    height: 40px;
    margin-left: 10px;
    margin-bottom: 18px;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
    display: flex;
    align-items: center;
  }

  .heart-new:hover {
    transform: scale(1.3);
  }

</style>
