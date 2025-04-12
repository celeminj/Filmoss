@extends('index.index')
@section('contenido')
    <div class="categoria">
        <div class="portada-categoria">
            <div class="imagen-categoria">
                <img src="{{ $categoria->image }}" alt="">
            </div>
            <div class="titulo-categoria">
                <h2>Tu selección de</h2>
                <h1>{{ $categoria->categoria }}</h1>
            </div>
        </div>

        <div id="app">
            <div class="has-visto">
                <h4>Porque has visto...</h4>
                <portada-categoria :id-categoria="{{ $categoria->id }}"></portada-categoria>
            </div>
            <div class="has-visto">
                <h4>Ya has visto...</h4>
                <div class="has-visto-interior">
                        <div class="has-visto-1">
                                <categoria-yahasvisto :id-categoria="{{ $categoria->id }}"></categoria-yahasvisto>
                        </div>
                </div>
        </div>
               <categoria-tesorpendera :id-categoria="{{ $categoria->id }}"></categoria-tesorpendera>
               <categoria-novedades :id-categoria="{{ $categoria->id }}"></categoria-novedades>
        </div>
    </div>
@endsection