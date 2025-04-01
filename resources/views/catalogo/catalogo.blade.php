@extends('index.index')
@section('contenido')

    <div class="catalogo">
        <div class="foto-principal">
            <div class="degradado-foto-catalogo">

                <div class="interior-foto">
                    <div class="botones-foto">
                        <button class="flecha-siguiente-peli-foto"></button>
                        <div class="titulo-peli-catalogo">
                            <h1>NOMBRE PELÍCULA</h1>
                        </div>
                        <div class="descripcion-peli-catalogo">
                            <p>Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Eligendi illo quae aperiam
                                vel est dolore dolores error nam repudiandae,
                                numquam ab blanditiis ipsa consectetur, in
                                veritatis alias modi mollitia voluptatibus!</p>
                        </div>
                        <div class="peliculas-foto-catalogo">
                            {{-- <button class="flecha-peli-foto"><</button>
                        <div class="peli-foto-catalogo"></div>
                        <div class="peli-foto-catalogo"></div>
                        <div class="peli-foto-catalogo"></div>
                        <button class="flecha-peli-foto">></button> --}}
                        </div>
                        <button class="flecha-anterior-peli-foto"></button>
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
        <div id="app">
            <pelicula-destacada></pelicula-destacada>

            <seguir-viendo></seguir-viendo>
        </div>

        <div class="peliculas-destacadas">
            <h4>Destacan segun tus gustos...</h4>
            <div class="peli-destacada-prin">

            </div>
            <div class="pelis-destacadas-secund">

            </div>
            <div class="pelis-destacadas-terci">

            </div>
        </div>
        <div class="anadidas-recientemente">
            <h4>Añadidas para tí</h4>

        </div>
    </div>

    <br>
    <br>
