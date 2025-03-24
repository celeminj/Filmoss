<?php

namespace App\Http\Controllers;

use App\Models\Pelicula_nueva;
use Illuminate\Http\Request;

class PeliculaNuevaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  $peliculas_nuevas = Pelicula_nueva::all();

        return response()->json(Pelicula_nueva::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula_nueva $pelicula_nueva, $hora)
    {
        return view('pelicula.index', ['pelicula' => $pelicula_nueva, 'hora' => $hora]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula_nueva $pelicula_nueva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula_nueva $pelicula_nueva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula_nueva $pelicula_nueva)
    {
        //
    }
}
