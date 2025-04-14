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
            <div class="hora-envio-chat">
              <p style="font-size: 0.75rem; color: gray; margin: 5px 0 4px 0;">{{ mensaje.hora }}</p>
            </div>
            <div class="usuario-mas-mensaje">
              <div class="nombre-usuario-chat">Tú:</div>
              <div class="mensaje-usuario">
                <p>{{ mensaje.texto }}</p>
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
  import { ref, nextTick } from 'vue';
  
  const chatAbierto = ref(false);
  const mostrarBotonChat = ref(true);
  const nuevoMensaje = ref('');
  const mensajes = ref([]);
  const contenedorChat = ref(null);
  
  const abrirChat = () => {
    chatAbierto.value = true;
  };
  
  const cerrarChat = () => {
    chatAbierto.value = false;
  };
  
  const getHoraActual = () => {
    const ahora = new Date();
    const horas = ahora.getHours().toString().padStart(2, '0');
    const minutos = ahora.getMinutes().toString().padStart(2, '0');
    return `${horas}:${minutos}`;
  };
  
  const enviarMensaje = () => {
    const texto = nuevoMensaje.value.trim();
    if (texto !== '') {
      mensajes.value.push({
        texto,
        hora: getHoraActual()
      });
      nuevoMensaje.value = '';
      nextTick(() => {
        if (contenedorChat.value) {
          contenedorChat.value.scrollTop = contenedorChat.value.scrollHeight;
        }
      });
    }
  };
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
    background: #1F1E24;
    box-shadow: -2px 0 10px rgba(0, 0, 0, 0.3);
    transition: right 0.4s ease-in-out;
    z-index: 9999;
    padding: 1rem;
    overflow-y: auto;
    font-family: "Lexend";
    font-weight: 700;
  }
  
  #chat-lateral input {
    background-color: #EAD2AC;
    border: none;
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
  
  .interior-chat-en-curso {
    height: 770px;
    padding: 10px;
  }
  
  .nombre-usuario-chat {
    margin-left: 5px;
  }
  
  .mensaje-usuario {
    margin-left: 5px;
    margin-top: 1px;
  }
  
  #cerrar-chat {
    position: absolute;
    right: 9%;
    top: 1.5%;
    border: none;
    font-size: 25px;
    padding: 0px 15px;
    border-radius: 10px;
    background-color: #2EBFA5;
    font-weight: 700;
    color: white;
  }
  </style>
  