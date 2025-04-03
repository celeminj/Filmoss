@extends('index.index')
@section('contenido')
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="catalogo">
        <div class="foto-principal">
            <div class="degradado-foto-catalogo">
                <div class="carrusel">
                    <div class="interior-foto">
                        <div class="botones-foto">
                            <button class="flecha-siguiente-peli-foto" onclick="cambiarImagen(1)"><p>&#10094;</p></button>
                            <div class="titulo-peli-catalogo">
                                <h1>NOMBRE PELÍCULA</h1>
                            </div>
                            <div class="descripcion-peli-catalogo">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                     Iste illo ratione eius ipsa commodi itaque corrupti minima earum?
                                     Impedit possimus maxime, expedita facilis mollitia placeat quae
                                      architecto quidem nemo modi?</p>
                            </div>
                            <button class="flecha-anterior-peli-foto" onclick="cambiarImagen(-1)"><p>&#10095;</p></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div id="categoria-titulo">
            <H1><strong>CATEGORÍAS</strong></H1>
        </div>

        <div class="text-primary" id="categorias">
            <div class="card-categorias" data-bg="accion">
                <h2>ACCIÓN</h2>
            </div>
            <div class="card-categorias" data-bg="aventura">
                <h2>AVENTURA</h2>
            </div>
            <div class="card-categorias" data-bg="ciencia-ficcion">
                <h2>CIENCIA FICCIÓN</h2>
            </div>
            <div class="card-categorias" data-bg="comedia">
                <h2>COMEDIA</h2>
            </div>
        </div>
        <div class="peliculas-destacadas">
            <h4>Películas destacadas</h4>

            <!-- Flecha Izquierda -->
            <button class="flecha-anterior-peli-destacada">&#10095;</button>

            <div class="carrusel-destacadas">
                <div class="pelis-destacadas">
                    <div class="destacada">
                        <p>destacada-1</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-2</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-3</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-4</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-5</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-6</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-7</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-8</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-9</p>
                    </div>
                    <div class="destacada">
                        <p>destacada-10</p>
                    </div>

                </div>
            </div>

            <!-- Flecha Derecha -->
            <button class="flecha-siguiente-peli-destacada">&#10094;</button>
        </div>
        <div class="seguir-viendo">
            <h4>Sigue por donde lo dejaste</h4>
            <div class="contenedor-seguir-viendo">
                <div class="seguir-viendo-peli">
                    <div class="seguir-viendo-peli1">
                        <p>Peli-1</p>
                    </div>
                    <div class="seguir-viendo-peli2">
                        <p>Peli-2</p>
                    </div>
                </div>
                <div class="seguir-viendo-pelis">
                    <div class="seguir-viendo-pelis-1">
                        <p>Peli-3</p>
                    </div>
                    <div class="seguir-viendo-pelis-2">
                        <p>Peli-4</p>
                    </div>
                    <div class="seguir-viendo-pelis-3">
                        <p>Peli-5</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="peliculas-destacadas">
            <h4>Destacan por tus gustos</h4>

            <!-- Flecha Izquierda -->
            <button class="flecha-anterior-peli-destacada">&#10095;</button>

            <div class="carrusel-destacadas">
                <div class="pelis-destacadas">
                    <div class="destacada">
                        <p>Gusto-1</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-2</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-3</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-4</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-5</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-6</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-7</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-8</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-9</p>
                    </div>
                    <div class="destacada">
                        <p>Gusto-10</p>
                    </div>

                </div>
            </div>

            <!-- Flecha Derecha -->
            <button class="flecha-siguiente-peli-destacada">&#10094;</button>
        </div>
        <div class="peliculas-destacadas">
            <h4>Añadidas para tí</h4>

            <!-- Flecha Izquierda -->
            <button class="flecha-anterior-peli-destacada">&#10095;</button>

            <div class="carrusel-destacadas">
                <div class="pelis-destacadas">
                    <div class="destacada">
                        <p>Añadidas-1</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-2</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-3</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-4</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-5</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-6</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-7</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-8</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-9</p>
                    </div>
                    <div class="destacada">
                        <p>Añadidas-10</p>
                    </div>

                </div>
            </div>

            <!-- Flecha Derecha -->
            <button class="flecha-siguiente-peli-destacada">&#10094;</button>
        </div>

    <br>
    <br>


    <script>
   document.addEventListener("DOMContentLoaded", () => {
    const imagenes = [
        "url('https://musicart.xboxlive.com/7/7d0f5200-0000-0000-0000-000000000002/504/image.jpg')",
        "url('https://images.ctfassets.net/m3qyzuwrf176/SZGqgU6XJDSRXLBzJEiua/e9a71d3c0fd3fc3b8934402161d08161/Jan11_SHREK_2_FamilyMatinees5MHL.jpg?fm=webp&w=2000')",
        "url('https://www.afundacion.org/images/fundacion_publicaciones/wall-e.jpg')",
        "url('https://m.media-amazon.com/images/S/pv-target-images/858a4191d817538da08cf7b4c18ad15b44f467b660f1555a11e5905764f793d7.jpg')"
    ];

    let indexActual = 0;
    const fotoPrincipal = document.querySelector('.foto-principal');

    // Función para cambiar la imagen de fondo con transición suave
    function cambiarImagen(direccion) {
        indexActual = (indexActual + direccion + imagenes.length) % imagenes.length;
        fotoPrincipal.style.opacity = "0"; // Desvanece la imagen

        setTimeout(() => {
            fotoPrincipal.style.backgroundImage = imagenes[indexActual];
            fotoPrincipal.style.opacity = "1"; // Vuelve a aparecer con la nueva imagen
        }, 500);
    }

    // Cambio automático cada 15 segundos
    setInterval(() => cambiarImagen(1), 15000);

    // Establecer la primera imagen al cargar la página
    fotoPrincipal.style.backgroundImage = imagenes[0];

    // Lógica para los carruseles
    const carruseles = document.querySelectorAll(".peliculas-destacadas");

    carruseles.forEach((carrusel) => {
        const contenedorPeliculas = carrusel.querySelector(".pelis-destacadas");
        const flechaIzquierda = carrusel.querySelector(".flecha-anterior-peli-destacada");
        const flechaDerecha = carrusel.querySelector(".flecha-siguiente-peli-destacada");
        const tarjetas = carrusel.querySelectorAll(".destacada");

        let posicion = 0;
        const cantidadVisible = 5;
        const totalTarjetas = tarjetas.length;
        const desplazamiento = tarjetas[0].offsetWidth + 40;

        // Función para actualizar la posición del carrusel con animación
        function actualizarCarrusel() {
            let desplazamientoTotal = -(desplazamiento * posicion);
            contenedorPeliculas.style.transform = `translateX(${desplazamientoTotal}px)`;
        }

        // Mover hacia la derecha
        flechaDerecha.addEventListener("click", () => {
            if (posicion < totalTarjetas - cantidadVisible) {
                posicion++;
            } else {
                posicion = 0;
            }
            actualizarCarrusel();
        });

        // Mover hacia la izquierda
        flechaIzquierda.addEventListener("click", () => {
            if (posicion > 0) {
                posicion--;
            } else {
                posicion = totalTarjetas - cantidadVisible;
            }
            actualizarCarrusel();
        });
    });
});


</script>
