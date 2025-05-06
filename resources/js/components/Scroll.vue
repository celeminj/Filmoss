<template>
  <div class="contenedor-home">
    <div class="video-filmo-container">
      <video autoplay muted loop class="video-filmo-bg">
        <source src="/public/mp4/pulp.mp4" type="video/mp4">
      </video>
      <div class="video-filmo-overlay"></div>
    </div>
        <div class="filmo-marquee-container">
            <div class="filmo-marquee">
                <span>FILMOFILMOFILMOFILMOFILMO</span>
                <span>FILMOFILMOFILMOFILMOFILMOFILMO</span>
            </div>
            <div class="filmo-marquee filmo-marquee-reverse">
                <span>FILMOFILMOFILMOFILMOFILMOFILMO</span>
                <span>FILMOFILMOFILMOFILMOFILMOFILMO</span>
            </div>
        </div>

        <div class="presenta-text" style="margin-top: 30rem;">
            <h1 class="cartelera-inicio">PRESENTA</h1>
        </div>
        <hr class="barra-blanca" />

        <div class="descripcion-container">
            <div class="descripcionFilmo">
                <div class="text-line">
                    <span class="filmo">Filmo</span> es una plataforma diseñada para los amantes del cine, donde podrás
                    disfrutar de una extensa variedad de películas, series y dibujos de todos los géneros.
                </div>
                <div class="text-line">
                    Filmo te ofrece una experiencia única para explorar y descubrir nuevos contenidos.
                </div>
                <div class="text-line">
                    Facilita tu acceso a todo lo que el mundo del cine tiene para ofrecer.
                </div>
            </div>
        </div>
        <div id="app">
            <EstadisticasHome></EstadisticasHome>
        </div>
        <div class="image-scroll-gallery">
            <div class="scroll-image" v-for="(image, index) in galleryImages" :key="index">
                <img :src="image.src" :alt="image.alt" class="gallery-img" />
            </div>
        </div>

        <div class="presenta-text">
            <h1 class="cartelera-inicio"><strong>CARTELERA</strong></h1>
            <hr class="barra-blanca" />
            <div>
                <a class="btnInicio" href="cartelera"><strong>VER MÁS</strong></a>
            </div>
        </div>

        <img src="https://i.postimg.cc/1RgXJd7G/abeibqt571p91-1.png" alt="" class="imagen-inicio" />
    </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import EstadisticasHome from './estadisticasHome.vue'

gsap.registerPlugin(ScrollTrigger)

const galleryImages = [
    {
        src: "https://www.ecartelera.com/carteles/fondos/5900/5964-n2.jpg",
        alt: "Película de acción"
    },
    {
        src: "https://ep01.epimg.net/verne/imagenes/2019/01/13/articulo/1547386341_975143_1547458878_noticia_normal.jpg",
        alt: "Película de acción"
    },
    {
        src: "  https://pics.filmaffinity.com/Apocalypse_Now-297470015-large.jpg",
        alt: "Película de acción"
    },
]



onMounted(() => {
    gsap.to(".filmo-marquee span", {
        x: "-50%",
        duration: 30,
        repeat: -1,
        ease: "none"
    })
    gsap.to(".filmo-marquee-reverse span", {
        x: "50%",
        duration: 30,
        repeat: -1,
        ease: "none"
    })

    nextTick(() => {
        revealElements.value.forEach((container) => {
            const image = container.querySelector('img')

            const tl = gsap.timeline({
                scrollTrigger: {
                    trigger: container,
                    toggleActions: 'restart none none reset'
                }
            })

            tl.set(container, { autoAlpha: 1 })
            tl.from(container, {
                xPercent: -100,
                duration: 1.5,
                ease: 'power2.out'
            })
            tl.from(
                image,
                {
                    xPercent: 100,
                    scale: 1.3,
                    duration: 1.5,
                    delay: -1.5,
                    ease: 'power2.out'
                },
                0
            )
        })
    })

    gsap.utils.toArray(".scroll-image").forEach((image, i) => {
        gsap.from(image, {
            scrollTrigger: {
                trigger: image,
                start: "top 80%",
                toggleActions: "play none none none"
            },
            y: 100,
            opacity: 0,
            duration: 1,
            delay: i * 0.2,
            ease: "power2.out"
        })
    })
})

onBeforeUnmount(() => {
    ScrollTrigger.getAll().forEach(trigger => trigger.kill())
    gsap.killTweensOf(".filmo-marquee span")
    gsap.killTweensOf(".filmo-marquee-reverse span")
})
</script>


<style scoped>
.contenedor-home {
    margin-top: 8rem;
    position: relative;
}

.video-filmo-container {
    margin-top: -8rem;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 58rem;
    z-index: 0;
    overflow: hidden;
}

.video-filmo-bg {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video-filmo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.8) 100%);
}

.filmo-marquee-container {
    position: relative;
    z-index: 1;
    width: 100%;
    overflow: hidden;
    margin: 2rem 0;
}

.filmo-marquee,
.filmo-marquee-reverse {
    display: flex;
    width: 200%;
    color: #ead2ac4c;
    font-size: 13rem;
    font-weight: 800;
    mix-blend-mode: lighten;
    white-space: nowrap;
}

.filmo-marquee:hover,
.filmo-marquee-reverse:hover {
    color: #2EBFA5;
}

.filmo-marquee span,
.filmo-marquee-reverse span {
    display: inline-block;
    width: 50%;
    text-align: center;
}

.descripcion-container {
    padding: 2rem;
    margin: 3rem auto;
    max-width: 800px;
}

.descripcionFilmo {
    color: #EAD2AC;
    font-family: "Poppins", sans-serif;
    font-size: 1.5rem;
    line-height: 1.6;
}

.text-line {
    margin-bottom: 1.5rem;
}

.filmo {
    font-weight: bold;
    color: #2EBFA5;
}

.image-scroll-gallery {
    display: flex;
    flex-direction: column;
    gap: 2rem;
    padding: 2rem;
    margin: 3rem auto;
    max-width: 1000px;
}

.scroll-image {
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

.gallery-img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.5s ease;
}

.gallery-img:hover {
    transform: scale(1.03);
}

.presenta-text {
    position: relative;
    z-index: 2;
}

.barra-blanca {
    width: 50%;
    height: 2px;
    background-color: #ffffff;
    margin: auto;
    border: none;
    margin-bottom: 80px;
}

.cartelera-inicio {
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

.imagen-inicio {
    margin-top: 80px;
    width: 100%;
}



.container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
    position: relative;
}

img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    transform-origin: left;
}

.reveal {
    visibility: hidden;
    position: relative;
    width: 80%;
    height: 80%;
    max-width: 500px;
    overflow: hidden;
}

.credit {
    font-family: 'Termina', sans-serif;
    position: absolute;
    bottom: 10px;
}

.credit a {
    color: white;
    text-decoration: none;
}
</style>
