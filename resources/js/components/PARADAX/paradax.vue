<script setup lang="ts">
import { onMounted, ref, nextTick } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

const parallaxImg = ref<HTMLElement | null>(null)

onMounted(async () => {
    await nextTick()

    gsap.to(parallaxImg.value, {
        y: '-50%',
        ease: 'none',
        scrollTrigger: {
            trigger: parallaxImg.value,
            start: 'top bottom',
            end: 'bottom top',
            scrub: true,
        }
    })
})
</script>

<template>
    <div class="parallax-container">
        <img src="https://www.ecartelera.com/carteles/fondos/5900/5964-n2.jpg" alt="" class="image-parallax"
            ref="parallaxImg" />
    </div>
</template>

<style>
.parallax-container {
    position: relative;
    overflow: hidden;
    height: 100vh;
    width: 100vw;
}

.image-parallax {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
}
</style>
