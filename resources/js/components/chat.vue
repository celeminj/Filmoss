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
      <h3>Live chat</h3>
      <button id="cerrar-chat" @click="cerrarChat">&times;</button>
    </div>

    <div class="chat-en-curso">
      <div class="interior-chat-en-curso" ref="contenedorChat">
        <div v-for="(mensaje, index) in mensajes" :key="index" class="bloque-mensaje">
          <!-- <div class="hora-envio-chat">
            <p style="font-size: 0.75rem; color: gray; margin: 5px 0 4px 0;">{{ mensaje.fecha }}</p>
          </div> -->
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
        <button class="btn btn-secondary" type="button" @click="enviarMensaje">></button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, nextTick } from "vue";
import axios from "axios";

const props = defineProps({
  peliculaId: Number,
  hora: Date,
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
    // Construir la URL de la API con los parámetros correctos
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
      evento_pelicula_id: props.eventoId,  // Usamos props.eventoId
      usuario_id: props.usuarioId         // Usamos props.usuarioId
    });

    // Agregar el mensaje al array local
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
.boton-mostrar-chat {
  position: absolute;
  top: 10%;
  right: 2%;
  cursor: pointer;
  background: white;
  padding: 8px;
  border-radius: 50%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
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
