<template>
  <div>
    <qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>

    <div v-if="qrContent">
      <p>QR escaneado:</p>
      <a :href="qrContent" target="_blank">{{ qrContent }}</a>
    </div>
  </div>
</template>

<script>
import { QrcodeStream } from 'vue-qrcode-reader'

export default {
  components: {
    QrcodeStream
  },
  data() {
    return {
      qrContent: null
    }
  },
  methods: {
    onDecode(result) {
      this.qrContent = result // El QR contiene la URL
    },
    onInit(promise) {
      promise.catch(error => {
        console.error("Problema con la cámara:", error)
      })
    }
  }
}
</script>
