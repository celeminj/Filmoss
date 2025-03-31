<template>


<button id="desplegable-toggle" class="menu-boton">☰</button>


</template>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const menuButton = document.getElementById("desplegable-toggle");
    const navMenu = document.querySelector(".paginas-nav");
    const usuario = document.getElementById("usuario");

    menuButton.addEventListener("click", function (event) {
        event.stopPropagation();
        navMenu.classList.toggle("active");

        // Mostrar u ocultar el usuario en pantallas pequeñas
        if (window.innerWidth <= 400) {
            usuario.classList.toggle("visible");
        }
    });

    // Si haces clic fuera del menú, se cierra
    document.addEventListener("click", function (event) {
        if (!navMenu.contains(event.target) && !menuButton.contains(event.target)) {
            navMenu.classList.remove("active");

            // Asegurar que usuario se oculta en pantallas pequeñas
            if (window.innerWidth <= 400) {
                usuario.classList.remove("visible");
            }
        }
    });
});
</script>
