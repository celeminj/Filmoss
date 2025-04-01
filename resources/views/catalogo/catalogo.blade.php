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
        <div class="peliculas-destacadas">
            <h4>Películas destacadas</h4>
            <div class="pelis-destacadas">
                <div class="destacada1"></div>
                <div class="destacada2"></div>
                <div class="destacada2"></div>
                <div class="destacada2"></div>
                <div class="destacada2"></div>
            </div>
        </div>
        <div class="seguir-viendo">
            <h4>Sigue por donde lo dejaste</h4>
            <div class="contenedor-seguir-viendo">
                <div class="seguir-viendo-peli">
                    <div class="seguir-viendo-peli1">

                    </div>
                    <div class="seguir-viendo-peli2">

                    </div>

                </div>
                <div class="seguir-viendo-pelis">
                    <div class="seguir-viendo-pelis-1">

                    </div>
                    <div class="seguir-viendo-pelis-2">

                    </div>
                    <div class="seguir-viendo-pelis-3">

                    </div>
                </div>

            </div>



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
