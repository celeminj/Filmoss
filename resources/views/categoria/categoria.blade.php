@extends('index.index')
@section('contenido')
    <div class="categoria">
        <div class="portada-categoria">
            <div class="imagen-categoria">
                <img src="{{ asset('images/terror-ej.jpg') }}" alt="">
            </div>
            <div class="titulo-categoria">
                <h2>Tu selección de</h2>
                <h1>TERROR</h1>
            </div>
        </div>
        <div class="porque-has-visto">
            <h4>Porque has visto...</h4>
            <div class="porque-has-visto-interior">
                <div class="porque-has-visto-1">
                    <div class="titulo-peli1-porque">
                        <h3>Pelicula1</h3>
                    </div>
                    <div class="duracion-peli1-porque">
                        <h5>Duración min.</h5>
                    </div>
                    <div class="restriccion-edad">
                        <p>+16</p>
                    </div>
                </div>
                <div class="porque-has-visto-2">
                    <h3>Pelicula2</h3>
                </div>
                <div class="porque-has-visto-2">
                    <h3>Pelicula3</h3>
                </div>
            </div>

        </div>
        <div class="has-visto">
            <h4>Ya has visto...</h4>
            <div class="has-visto-interior">
                <div class="has-visto-1">
                    <h3>Pelicula 1</h3>
                </div>
                <div class="has-visto-1">
                    <h3>Pelicula 2</h3>
                </div>
                <div class="has-visto-1">
                    <h3>Pelicula 3</h3>
                </div>
                <div class="has-visto-1">
                    <h3>Pelicula 4</h3>
                </div>
                <div class="has-visto-1">
                    <h3>Pelicula 5</h3>
                </div>
            </div>
        </div>
        <div class="carrusel-categoria">
            <h1>Te sorprenderán</h1>
            <ul class="list">
                <li class="hide"><h3>Peli1</h3></li>
                <li class="prev"><h3>Peli2</h3></li>
                <li class="act"><h3>Peli3</h3></li>
                <li class="next"><h3>Peli4</h3></li>
                <li class="next new-next"><h3>Peli5</h3></li>
            </ul>

            <div class="swipe"></div>




        </div>
        <div class="novedades">
            <h4>Novedades</h4>
            <div class="novedades-interior">
                <div class="novedades-interior-contenido">
                    <div class="novedades-1">
                        <h3>Novedades 1</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 2</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 3</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 4</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 5</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 6</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 7</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 8</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 9</h3>
                    </div>
                    <div class="novedades-1">
                        <h3>Novedades 10</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- script carrusel  novedades --}}

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const novedadesContainer = document.querySelector(".novedades-interior-contenido");
            let scrollAmount = 0;
            let velocidad = 0.5; // Velocidad inicial más lenta
            let direccion = -0.8; // -1 (izquierda), 1 (derecha)
            let isDragging = false;
            let startX;
            let scrollLeft;
            let isPaused = false;
            let acelerando = true; // Para controlar la aceleración

            function scrollCarrusel() {
                if (!isDragging && !isPaused) {
                    scrollAmount += velocidad * direccion;
                    novedadesContainer.style.transform = `translateX(${scrollAmount}px)`;

                    // **Aceleración progresiva** cuando empieza a moverse
                    if (acelerando && velocidad < 0.8) {
                        velocidad += 0.02; // Incremento suave
                    }

                    // **Cuando llega al final o inicio**
                    if (scrollAmount <= -novedadesContainer.scrollWidth / 2 || scrollAmount >= 0) {
                        isPaused = true;
                        acelerando = false; // Detener aceleración

                        // **Desaceleración progresiva antes de cambiar dirección**
                        let slowDown = setInterval(() => {
                            if (velocidad > 0.2) {
                                velocidad -= 0.1; // Desaceleración suave
                            } else {
                                clearInterval(slowDown);

                                setTimeout(() => {
                                    direccion *= -1; // Cambiar dirección
                                    velocidad = 0.8; // Reiniciar velocidad
                                    acelerando = true;
                                    isPaused = false;
                                }, 1000);
                            }
                        }, 50);
                    }
                }

                requestAnimationFrame(scrollCarrusel);
            }

            // **Inicia la animación cuando el div esté en pantalla**
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        requestAnimationFrame(scrollCarrusel);
                    }
                });
            }, {
                threshold: 0.2
            });

            observer.observe(novedadesContainer);

            // **EVENTOS PARA ARRASTRAR MANUALMENTE**
            novedadesContainer.addEventListener("mousedown", (e) => {
                isDragging = true;
                startX = e.pageX - novedadesContainer.offsetLeft;
                scrollLeft = scrollAmount;
                novedadesContainer.style.cursor = "grabbing";
            });

            document.addEventListener("mouseup", () => {
                isDragging = false;
                novedadesContainer.style.cursor = "grab";
            });

            novedadesContainer.addEventListener("mousemove", (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - novedadesContainer.offsetLeft;
                const walk = (x - startX) * 1.5; // Reduce la sensibilidad
                scrollAmount = scrollLeft + walk;
                novedadesContainer.style.transform = `translateX(${scrollAmount}px)`;
            });

            // **Compatibilidad con dispositivos táctiles**
            novedadesContainer.addEventListener("touchstart", (e) => {
                isDragging = true;
                startX = e.touches[0].pageX;
                scrollLeft = scrollAmount;
            });

            novedadesContainer.addEventListener("touchend", () => {
                isDragging = false;
            });

            novedadesContainer.addEventListener("touchmove", (e) => {
                if (!isDragging) return;
                const x = e.touches[0].pageX;
                const walk = (x - startX) * 1.5;
                scrollAmount = scrollLeft + walk;
                novedadesContainer.style.transform = `translateX(${scrollAmount}px)`;
            });

            novedadesContainer.style.cursor = "grab";
        });
    </script>

    {{-- script carrusel Te sorprenderán--}}


    <script>
        const list = document.querySelector(".list");

        function updateClasses() {
            const items = [...list.children];

            // Limpiamos todas las clases
            items.forEach(el => el.className = '');

            if (items[0]) items[0].classList.add("hide");
            if (items[1]) items[1].classList.add("prev");
            if (items[2]) items[2].classList.add("act");
            if (items[3]) items[3].classList.add("next");
            if (items[4]) items[4].classList.add("next", "new-next");
        }

        function next() {
            const first = list.firstElementChild;
            list.appendChild(first);
            updateClasses();
        }

        function prev() {
            const last = list.lastElementChild;
            list.insertBefore(last, list.firstElementChild);
            updateClasses();
        }

        function slide(el) {
            if (el.classList.contains("next")) {
                next();
            } else if (el.classList.contains("prev")) {
                prev();
            }
        }

        // Click
        list.addEventListener("click", e => {
            slide(e.target);
        });

        // Swipe
        const swipeZone = document.querySelector(".swipe");
        const hammer = new Hammer(swipeZone);
        hammer.on("swipeleft", next);
        hammer.on("swiperight", prev);

        // Inicializar clases al cargar
        updateClasses();
    </script>
