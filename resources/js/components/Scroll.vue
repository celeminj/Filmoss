<template>
    <div class="contenedor-home">
    <div class="animated-cont" animate>FILMOFILMOFILMO</div>
    <div class="animated-cont" animate>FILMOFILMOFILMO</div>
    <div class="animated-cont" animate>FILMOFILMOFILMO</div>
    <div class="animated-cont" animate>FILMOFILMOFILMO</div>
  <div class="presenta-text">
    <h1 class="cartelera-inicio">PRESENTA</h1>
  </div>
  <hr class="barra-blanca">
  <div class="scroll-container">
    <!-- <img ref="scrollImage" src="/public/images/personas.png" alt="Imagen que sigue" class="scroll-image" />
    <img ref="staticImage" src="/public/images/fondo.jpg" alt="" class="static-imagen"> -->
    <div class="descripcionFilmo">
      <div class="text-line" v-for="(item, index) in items" :key="index" :style="{ opacity: opacityValue(index) }">
        <span v-html="item"></span>
      </div>
    </div>
  </div>
  <div class="presenta-text">
    <h1 class="cartelera-inicio"><strong>CARTELERA</strong></h1>
    <hr class="barra-blanca">
    <div >
      <a  class="btnInicio" href="cartelera"><strong>VER MÁS</strong></a>
    </div>

  </div>
  <img src="https://i.postimg.cc/1RgXJd7G/abeibqt571p91-1.png" alt="" class="imagen-inicio">
</div>
</template>

<script>
import Lenis from 'lenis';
import gsap from 'gsap';
import SplitType from 'split-type';
export default {
  data() {
    return {
      items: [
        "<span class='filmo'>Filmo</span> es una plataforma diseñada para los amantes del cine, donde podrás ",
        "disfrutar de una extensa variedad de películas, series y dibujos de todos los géneros.",
        "Filmo te ofrece una experiencia única para explorar y descubrir nuevos contenidos,",
        "facilitando tu acceso a todo lo que el mundo del cine tiene para ofrecer."
      ],
      stopScrollAt: 1000,
    };
  },
  methods: {
    opacityValue(index) {
      const scrollPosition = window.scrollY;
      const windowHeight = window.innerHeight;
      const itemPosition = index * 100;
      const distance = Math.max(0, itemPosition - scrollPosition + windowHeight);
      return Math.min(1, distance / windowHeight);
    },
    handleScroll() {
      const scrollY = window.scrollY;
      const img = this.$refs.scrollImage;
      const staticImg = this.$refs.staticImage;
      const staticPosition = staticImg.offsetTop;

      if (scrollY < staticPosition) {
        img.style.transform = `translateY(${scrollY}px)`;
      } else {
        img.style.position = 'absolute';
        img.style.top = `${staticPosition}px`;
      }
    },
    textAnimation(){
        gsap.fromTo(
            ".text-line",
            { opacity: 0, y: 50, transform: "translate3d(0, 50px, 0)" },
            {
            duration: 1,
            opacity: 1,
            y: 0,
            transform: "translate3d(0, 0, 0)",
            ease: "power4.out",
            stagger: 0.6, // Retraso de 0.05s entre cada frase
            delay: 0.01,
            }
        );
    }
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);

    new SplitType('[animate]', {
    types: 'lines, words, chars',
    tagName: 'span'
  });


gsap.to(this.$refs.animatedBox, {
  x: 3,  // Mueve a la derecha 300px
  y: 1,  // Mueve hacia abajo 100px
  duration: 2,
  ease: 'power2.out'
});

    const lenis = new Lenis({
      duration: 1.2,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    });

    const raf = (time) => {
      lenis.raf(time);
      requestAnimationFrame(raf);
    };

    requestAnimationFrame(raf);

    this.textAnimation();

  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  }
};
</script>

<style scoped>
.contenedor-home{
    margin-top: 8rem;
}
.animated-cont{
  color: #ead2ac4c;
  font-size: 7rem;
  text-align: center;
  font-weight: 800;
  transition-duration: 1s;
  }
  .animated-cont:hover{
  color: #2EBFA5;;
  }

.text-filmo-container{

  display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}

.barra-blanca {
  width: 50%;
  height: 2px;
  background-color: #ffffff;
  margin: auto;
  border: none;
  margin-bottom: 80px;
}
.cartelera-inicio{
    margin-top: 9rem;
  text-align: center;
    color: #EAD2AC;
    font-size: 100px;
    margin-bottom: 80px;
}
.btnInicio {
  padding: 8px;
    color: #000;
    padding-left: 30px;
    padding-right: 30px;
    border-radius: 7px;
    width: 9rem;
    height: 2.7rem;
    text-align: center;
    background-color: #EAD2AC;
    font-family: "Lexend", sans-serif;
    display: block;
    margin: 0 auto;
    text-decoration: none;
    cursor: pointer;
}

.imagen-inicio{
  margin-top: 80px;
  width: 100%;
}
.text-filmo-container {
  height: 100vh;
}
.scroll-container {
  height: 250vh; /* Ajustado para más espacio de scroll */
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  color: white;
}
.scroll-image {
  position: absolute;
  top: 100px;
  left: 25%;
  transform: translateX(-50%);
  width: 51rem;
  transition: transform 0.2s ease;
}
.static-imagen {
  position: absolute;
  top: 1000px; /* Ajustado para coincidir con la parada del scroll */
  left: 25%;
  z-index: -1;
  transform: translateX(-50%);
  width: 51rem;
}
.descripcionFilmo {
  margin-top: 100px;
  width: 100%;
  text-align: right;
}
.descripcionFilmo div {
  font-family: "Poppins", sans-serif;
  color: #EAD2AC;
  font-size: 2rem;
  padding: 10px;
  margin: 0 70 auto;
  transition: opacity 0.5s ease;
}
.filmo {
  font-weight: bold;
}
</style>
