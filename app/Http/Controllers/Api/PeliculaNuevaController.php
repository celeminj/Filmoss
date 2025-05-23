<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Models\Pelicula_nueva;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class PeliculaNuevaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  $peliculas_nuevas = Pelicula_nueva::all();

      return response()->json(Pelicula_nueva::with('actores')->get());
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
        $pelicula_nueva = new Pelicula_nueva();
        $pelicula_nueva->titulo = $request->input("titulo");
        $pelicula_nueva->image = $request->input("image");
        $pelicula_nueva->descripcion = $request->input("descripcion");
        $pelicula_nueva->duracion = $request->input("duracion");
        $pelicula_nueva->restriccion_edad = $request->input("restriccion_edad");
        $pelicula_nueva->calificacion = $request->input("calificacion");
        $pelicula_nueva->idioma = $request->input("idioma");
        $pelicula_nueva->fecha_estreno = $request->input("fecha_estreno");
        $pelicula_nueva->pelicula_src = $request->input("pelicula_src");

        $pelicula_nueva->save();

        if ($request->has('actores') && is_array($request->actores)) {
            $pelicula_nueva->actores()->sync($request->actores);
        }

        try {
            return response()->json([
                'message' => 'Película creada correctamente',
                'pelicula' => $pelicula_nueva
            ], 201);

        } catch (QueryException $ex) {
            return response()->json([
                'error' => Utilitat::errorMessage($ex)
            ], 500);
        }
    }


    public function show($peliculaId, $hora, $eventoId)
    {
        $pelicula = Pelicula_nueva::findOrFail($peliculaId);
        
        return view('pelicula_nueva.index', [
            'pelicula' => $pelicula,
            'hora' => $hora,
            'eventoId' => $eventoId // Asegúrate de pasar este valor
        ]);
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
        try {

            $pelicula_nueva->titulo = $request->input("titulo");
            $pelicula_nueva->image = $request->input("image");
            $pelicula_nueva->descripcion = $request->input("descripcion");
            $pelicula_nueva->duracion = $request->input("duracion");
            $pelicula_nueva->restriccion_edad = $request->input("restriccion_edad");
            $pelicula_nueva->calificacion = $request->input("calificacion");
            $pelicula_nueva->idioma = $request->input("idioma");
            $pelicula_nueva->fecha_estreno = $request->input("fecha_estreno");
            $pelicula_nueva->pelicula_src = $request->input("pelicula_src");

                $pelicula_nueva->save();

                $pelicula_nueva->actores()->detach();
                if ($request->has('actores') && is_array($request->actores)) {
                    $pelicula_nueva->actores()->sync($request->actores);
                }

            return response()->json(['message' => 'Pelicula Nueva actualizada correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula_nueva $pelicula_nueva)
    {
        try {
            $pelicula_nueva->delete();
            return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }
}
