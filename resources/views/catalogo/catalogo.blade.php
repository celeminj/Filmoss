@extends('index.index')
@section('contenido')

    <div class="catalogo">

        <div id="app">
            <animation-catalogo></animation-catalogo>
            <div id="categoria-titulo">
                <H1><strong>CATEGORÍAS</strong></H1>
            </div>
            <categorias></categorias>
            <pelicula-destacada></pelicula-destacada>
            <seguir-viendo></seguir-viendo>
        </div>

        <div class="peliculas-destacadas">
            <h4>Destacan segun tus gustos...</h4>
            <div class="peli-destacada-prin">
            </div>
        </div>
        <div class="anadidas-recientemente">
            <h4>Añadidas para tí</h4>
        </div>
    </div>
