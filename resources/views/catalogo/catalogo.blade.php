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
            <div class="peliculas-destacadas">
                <h4>Destacan según tus gustos...</h4>
                <catalogo-destacanseguntusgustos></catalogo-destacanseguntusgustos>
            </div>
            <div class="anadidas-recientemente">
                <peliculas-recientemente></peliculas-recientemente>
            </div>
        </div>
    </div>
