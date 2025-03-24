@extends('index.index')
@section('contenido')
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="text-light">
        <h1>CARTELERA</h1>

    </div>
    <div class="container-fluid">
        <ul class="paginas-nav">
            <li><a id="len1" class="hoverable">Lunes</a></li>
            <li><a id="len2" class="hoverable">Martes</a></li>
            <li><a id="len3" class="hoverable">Miercoles</a></li>
            <li><a id="len4" class="hoverable">Jueves</a></li>
            <li><a id="len4" class="hoverable">Viernes</a></li>
            <li><a id="len4" class="hoverable">Sabado</a></li>
            <li><a id="len4" class="hoverable">Domingo</a></li>
        </ul>
    </div>
    <div class="cartelera-dia"><strong>LUNES</strong></div>


    <div id="app">
        <film></film>
    </div>
