<template>
  <!-- Botón flotante (icono SVG de flecha) -->
  <div class="boton-mostrar-chat" v-if="mostrarBotonChat" @click="abrirChat">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#2EBFA5" viewBox="0 0 24 24">
      <path d="M9 18l6-6-6-6" />
    </svg>
  </div>

  <!-- Chat lateral -->
  <div id="chat-lateral" :style="{ right: chatAbierto ? '0' : '-400px' }">
    <div style="display: flex; justify-content: space-between; align-items: center;">
      <img src="https://i.postimg.cc/x1c4B87p/Ellipse-49.png" alt="Logo" style="width: 20px; height: 20px;" />
      <h3>Live chat</h3>
      <button id="cerrar-chat" @click="cerrarChat"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0,0,256,256"
style="fill:#40C057;">
<g fill="#40c057" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(10.66667,10.66667)"><path d="M19.99023,2.98633c-0.26377,0.00624 -0.51439,0.11645 -0.69727,0.30664l-7.29297,7.29297l-7.29297,-7.29297c-0.18827,-0.19353 -0.4468,-0.30272 -0.7168,-0.30273c-0.40692,0.00011 -0.77321,0.24676 -0.92633,0.62377c-0.15312,0.37701 -0.06255,0.80921 0.22907,1.09303l7.29297,7.29297l-7.29297,7.29297c-0.26124,0.25082 -0.36647,0.62327 -0.27511,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27511l7.29297,-7.29297l7.29297,7.29297c0.25082,0.26124 0.62327,0.36648 0.97371,0.27512c0.35044,-0.09136 0.62411,-0.36503 0.71547,-0.71547c0.09136,-0.35044 -0.01388,-0.72289 -0.27512,-0.97371l-7.29297,-7.29297l7.29297,-7.29297c0.29724,-0.28583 0.38857,-0.7248 0.23,-1.10546c-0.15857,-0.38066 -0.53454,-0.62497 -0.94679,-0.61524z"></path></g></g>
</svg></button>
    </div>

    <div class="chat-en-curso">
      <div class="interior-chat-en-curso" ref="contenedorChat">
        <div v-for="(mensaje, index) in mensajes" :key="index" class="bloque-mensaje">
          <div class="hora-envio-chat">
            <p style="font-size: 0.75rem; color: gray; margin: 5px 0 4px 0;">{{ mensaje.fecha }}</p>
          </div>
          <div class="usuario-mas-mensaje">
            <div class="nombre-usuario-chat">
              {{ mensaje.enviado ? mensaje.usuario.nombre : "Otro Usuario" }}
            </div>
            <div class="mensaje-usuario">
              <p>{{ mensaje.mensaje }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="enviar-chat">
      <div class="input-group mb-3">
        <input
          v-model="nuevoMensaje"
          @keypress.enter.prevent="enviarMensaje"
          type="text"
          class="form-control"
          placeholder="Escribe tu mensaje"
        />
        <button class="btn btn-secondary"  type="button" @click="enviarMensaje">></button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, nextTick } from "vue";
import axios from "axios";

const props = defineProps({
  peliculaId: Number,
  hora: TimeRanges,
  eventoId: Number,
  usuarioId: Number
});
const chatAbierto = ref(false)
const mostrarBotonChat = ref(true)
const nuevoMensaje = ref("")
const mensajes = ref([])
const contenedorChat = ref(null)
const abrirChat = () => {
  chatAbierto.value = true;
  cargarMensajes(); 
};
const cerrarChat = () => {
  chatAbierto.value = false;
};

const cargarMensajes = async () => {
  try {
    const response = await axios.get(`/pelicula_nueva/${props.peliculaId}/${props.hora}/${props.eventoId}/chat`);
    mensajes.value = response.data;
  } catch (error) {
    console.error("Error al cargar los mensajes:", error);
  }
};

const enviarMensaje = async () => {
  if (!nuevoMensaje.value.trim()) return;

  try {
    const response = await axios.post(`/pelicula_nueva/${props.peliculaId}/${props.hora}/${props.eventoId}/chat`, {
      mensaje: nuevoMensaje.value,
      evento_pelicula_id: props.eventoId, 
      usuario_id: props.usuarioId         
    });

    mensajes.value.push({
      mensaje: nuevoMensaje.value,
      enviado: true,
      usuario: { nombre: "Tú" },
      fecha: new Date().toLocaleTimeString()
    });

    nuevoMensaje.value = "";
    scrollToBottom();

  } catch (error) {
    console.error('Error completo:', error);
    if (error.response) {
      console.error('Datos del error:', error.response.data);
      console.error('Status:', error.response.status);
      console.error('Headers:', error.response.headers);
    }
  }
};


onMounted(() => {
  cargarMensajes();
});
</script>


<style scoped>
#cerrar-chat {
  border: none;
  background: none; /* Opcional, para quitar también el fondo */
}
.boton-mostrar-chat {
  position: absolute;
  top: 10%;
  right: 2%;
  cursor: pointer;
  background: rgb(255, 255, 255);
  padding: 8px;
  border-radius: 50%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}
.nombre-usuario-chat{
  font-size: 1rem;
  font-weight: bold;
  color: #2EBFA5;
}
#chat-lateral {
  color: white;
  position: fixed;
  top: 0;
  right: -400px;
  width: 400px;
  height: 100%;
  background: #1f1e24;
  box-shadow: -2px 0 10px rgba(0, 0, 0, 0.3);
  transition: right 0.4s ease-in-out;
  z-index: 9999;
  padding: 1rem;
  overflow-y: auto;
  font-family: "Lexend";
  font-weight: 700;
  
}

.chat-en-curso {
  height: 770px;
  padding: 20px 10px 0 10px;
  width: 350px;
  background-color: #2f2e36be;
  border-radius: 10px;
  overflow-y: auto;
}

.enviar-chat {
  margin-top: 20px;
  width: 350px;
  position: absolute;
  top: 90%;
}
</style>
