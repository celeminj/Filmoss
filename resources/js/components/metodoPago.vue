<template>
    <div>
      <!-- Modal de Suscripción -->
      <div v-if="visiblePrecio" class="modal-overlay">
        <div class="modal-container">
          <div class="metodo_pagos">
            <button class="cerrar-modal" @click="cerrarAmbosModales">✕</button>
            <div class="titulo-metodo_pago_precio">
              <h1><strong>SUSCRIPCIÓN</strong></h1>
            </div>
            <div class="boton-pago" v-for="subscripcion in subscripciones" :key="subscripcion.id">
              <div class="titulo-metodo_pago_precio">
                <h1><strong>PLAN MENSUAL</strong></h1>
                <h1><strong>{{ subscripcion.tipo_subscripcion }}</strong></h1>
                <button @click="abrirMetodoPago(subscripcion)" class="btn btn-primary">
                  {{ subscripcion.precio }} € + IVA
                </button>
                <div class="preciomanual">
                  <h3>59.99€ anuales</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  
      <!-- Modal de Pago -->
      <div v-if="visible" class="modal-overlay">
        <div class="modal-container">
          <div class="metodo_pago">
            <button class="cerrar-modal" @click="cerrarModal">✕</button>
            <div class="titulo-metodo_pago">
              <h1>AÑADIR METODO DE <span>PAGO</span></h1>
            </div>
            <div class="imagenes-metodo_pago">
              <img id="mastercard" :src="getImageUrl('Mastercard-logo.png')" alt="Mastercard" />
              <img id="visa" :src="getImageUrl('Visa_Logo.png')" alt="Visa" />
              <img id="paypal" :src="getImageUrl('Paypal_logo.png')" alt="Paypal" />
              <img id="google" :src="getImageUrl('Google_Pay_Logo.png')" alt="Google Pay" />
            </div>
            <div class="formulario-metodo_pago">
              <form @submit.prevent="cerrarModal">
                <label for="tipo-tarjeta">
                  <h3>Tipo tarjeta</h3>
                </label>
                <select class="form-select" id="tipo-tarjeta">
                  <option selected>-</option>
                  <option value="1">MasterCard</option>
                  <option value="2">Visa</option>
                  <option value="3">PayPal</option>
                  <option value="4">GooglePay</option>
                </select>
                <div class="mb-3">
                  <label for="nombre-titular">
                    <h3>Nombre del titular</h3>
                  </label>
                  <input type="text" required class="form-control" id="nombre-titular" placeholder="Introduce el nombre del titular" />
                </div>
                <div class="mb-3">
                  <label for="numero-tarjeta">
                    <h3>Número de tarjeta</h3>
                  </label>
                  <input type="text" required class="form-control" maxlength="16" id="numero-tarjeta" placeholder="0000-0000-0000-0000" />
                </div>
                <div class="fecha-cvv">
                  <div class="mb-3">
                    <label for="fecha-cad">
                      <h3>Fecha caducidad</h3>
                    </label>
                    <input type="date" required class="form-control" id="fecha-cad" />
                  </div>
                  <div class="mb-3">
                    <label for="cvv">
                      <h3>CVV</h3>
                    </label>
                    <input type="text" required class="form-control" id="cvv" placeholder="000" maxlength="3" inputmode="numeric" />
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" required type="checkbox" id="checkDefault" />
                  <label class="form-check-label" for="checkDefault">
                    <p>Acepto las políticas de privacidad</p>
                  </label>
                </div>
                <div class="boton-pago">
                  <button type="submit" class="btn btn-primary" id="boton-pago">PAGAR</button>
                </div>
              </form>
            </div>
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
        visible: false,
        visiblePrecio: false,
        subscripciones: [],
        suscripcionSeleccionada: null,  
      };
    },
    mounted() {
      this.getSuscripciones();
      if (!localStorage.getItem('pagoMostrado')) {
        this.visiblePrecio = true;
      }
    },
    methods: {
        async getSuscripciones() {
        try {
            const response = await axios.get('subscripcion');
            console.log(response.data); 
            this.subscripciones = response.data;
        } catch (error) {
            console.error('Error al obtener las suscripciones:', error);
        }
        },
      abrirMetodoPago(subscripcion) {
       const me = this;
       me.suscripcionSeleccionada = subscripcion;
       me.visiblePrecio = false;
       me.visible = true;
      },
      cerrarModal() {
        this.visible = false;
        localStorage.setItem('pagoMostrado', 'true');
      },
      cerrarAmbosModales() {
        this.visiblePrecio = false;
        this.visible = false;
        localStorage.setItem('pagoMostrado', 'true');
      },
      getImageUrl(fileName) {
        return new URL(`/public/images/${fileName}`, import.meta.url).href;
      }
    },
    
  };
  </script>

  
  <style scoped>
  .titulo-metodo_pago_precio{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  .titulo-metodo_pago_precio button{
    font-size: 60px;
    background-size: 5px 100%;
    color: #fff;
    border: none;
    padding: 50px 30px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 40px;
    margin-bottom: 40px;
  }
    .titulo-metodo_pago_precio button:hover{
        color: #2ebfa5;
    }
  .titulo-metodo_pago_precio h1{
    color: #2ebfa5;
    font-size: 60px;
  }
  .titulo-metodo_pago_precio h3{
    font-size: 20px;
  }
 .imagenes-metodo_pago {
  width: 100%;
  max-width: 500px;
  display: flex;
  justify-content: center;
  gap: 30px;
  margin: 20px auto;
  flex-wrap: wrap;
}

.imagenes-metodo_pago img {
  height: 30px;
  object-fit: contain;
  transition: transform 0.2s ease;
  cursor: pointer;
}
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 500px;
    height: 800px;
    width: 100%;
    color:wheat;
    border-radius: 20px;
    background-color: #1F1E24;
    z-index: 9999;
    margin-top: -200px;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease-in-out;
    padding-top: 80px;
    padding-left: 30px;
    padding-right: 30px;
  }
  .boton-pago{
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }
  
  .modal-container {
    background: transparent;
    padding: 0;
    border-radius: 10px;
    max-width: 800px;
    width: 100%;
  }
  
  .cerrar-modal {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 24px;
    background: none;
    border: none;
    color: #2ebfa5;
    cursor: pointer;
    z-index: 1;
  }
  
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
  
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  </style>
  