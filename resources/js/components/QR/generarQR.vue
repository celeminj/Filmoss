<template>
  <div>
    <vue-qr v-if="qrText" :text="qrText" :size="200"></vue-qr>
  </div>
</template>

<script>
import VueQr from 'vue-qr'

export default {
  components: {
    VueQr
  },
  props: {
    pelicula_nueva: Object 
  },
  computed: {
    qrText() {
      // Verifica si hay una película nueva y devuelve el texto del QR
      if (!this.pelicula_nueva || !this.pelicula_nueva.id) {
        return ''; // No muestra el QR si no hay ID de película
      }
      // Crea la URL del QR con el ID de la película
      return `/Filmoss/public/pelicula_nueva/${this.pelicula_nueva.id}`;
    }
  }
}
</script>
<style scoped>

</style>