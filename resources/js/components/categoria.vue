<template>
      <div class="text-primary" id="categorias">
          <a class="url-peli"   v-for="categoria in categorias"
          :key="categoria.id" 
            :href="`/Filmoss/public/categoria/${categoria.id}`">
                <div class="card-categorias" :style="{ backgroundImage: `linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.5)), url(${categoria.image})` }"
              >
               <h2>{{ categoria.categoria }}</h2>
            </div>
          </a>
      </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        categorias: [],
      };
    },
    created() {
      axios.get('categoria')
        .then(response => {
          this.categorias = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
  };
  </script>

  <style>
  .card-categorias {
      width: 20vw;
      height: 25vh;
      color: #EAD2AC;
      border-radius: 20px;
      position: relative;
      border: none;
      overflow: hidden;
      background-color: #222;
      transition: transform 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      font-weight: bold;
      text-transform: uppercase;
      text-align: center;
      background-size: cover;
      background-position: center;
  }

  .card-categorias h2 {
      font-size: 4rem;
      font-weight: bold;
      text-transform: uppercase;
      text-align: center;
      margin: 0;
      padding: 0;
  }

  .card-categorias:hover {
      color: #2EBFA5;
      transform: scale(1.02);
  }
  </style>
