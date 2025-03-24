@extends('index.index')

@section('contenido')

    <link
        href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    @vite(['resources/css/peli-catalogo.css'])

    <div class="reproductor">
        <div class="pelicula">
            <div class="degradado-info">

            </div>
            <IFRAME SRC="https://Smoothpre.com/embed/agtchgjvv15l" FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=NO
                WIDTH=1900 HEIGHT=1000 allowfullscreen></IFRAME>
        </div>

        <div class="info-peli">
            <div class="titulo-pelicula">
                <h1>LOS INCREIBLES 2</h1>
            </div>
            <div class="categorias">
                <p>Comedia, acción, animación</p>

            </div>
            <div class="edad">
                <p>+12</p>
            </div>

            <div class="descripcion-peli">
                <p>
                    Lorem ipsum dolor sit amet
                    consectetur adipisicing elit.
                    Rerum vero exercitationem
                    ratione molestiae aliquid
                    assumenda nemo alias, odit
                    natus, dolores recusandae in.
                </p>
            </div>
            <div class="botones-pelicula">
                <div class="ver-ya">
                    <button>VER YA</button>
                    <a href="https://Smoothpre.com/embed/agtchgjvv15l">
                        <div class="play-button"></div>
                    </a>
                </div>
                <div class="otros-botones">
                    <div class="trailer">
                        <button>Trailer</button>
                    </div>
                    <div class="heart">
                        {{-- <button>Favoritos</button> --}}
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="detalles">
        <div class="titulo-detalles">
            <h1>DETALLES</h1>
        </div>
        <div class="texto-detalles">
            <h2>Los increibles 2</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, laboriosam accusamus, at dolores et
                mollitia architecto debitis nesciunt corrupti, totam amet consequatur in velit pariatur hic nobis error
                libero adipisci.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio ratione accusamus laudantium officiis
                optio provident
                vitae voluptatum animi unde nulla molestias temporibus suscipit voluptatibus ex, sit magni mollitia labore
                neque?</p>
            <h4>Género</h4>
            <p>Comedia, acción, animación</p>
            <h4>Fecha de estreno</h4>
            <p>2023</p>
            <h4>Calificación</h4>
            +12
        </div>

    </div>
    <div class="reparto">
        <div class="titulo-reparto">
            <h1>REPARTO</h1>
        </div>
        <div class="actores">

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let container = document.querySelector(".actores");

            if (container) {
                for (let i = 0; i < 9; i++) {
                    agregarActor(container, i + 1);
                }
            }
        });

        function agregarActor(container, index) {
            let actorHTML = `
                <div class="actor">
                    <div class="imagen">
                        <div class="nombre-actor">
                            <h4>Actor ${index}</h4>
                        </div>
                    </div>
                </div>
            `;

            container.innerHTML += actorHTML;
        }
    </script>

