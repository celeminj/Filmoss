<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class PeliculaController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Pelicula::with(['actores', 'categorias'])->get());
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
        $pelicula = new Pelicula();
        $pelicula->titulo = $request->input("titulo");
        $pelicula->image = $request->input("image");
        $pelicula->descripcion = $request->input("descripcion");
        $pelicula->duracion = $request->input("duracion");
        $pelicula->restriccion_edad = $request->input("restriccion_edad");
        $pelicula->calificacion = $request->input("calificacion");
        $pelicula->idioma = $request->input("idioma");
        $pelicula->fecha_estreno = $request->input("fecha_estreno");
        $pelicula->pelicula_src = $request->input("pelicula_src");

        $pelicula->save();


        if ($request->has('actores') && is_array($request->actores)) {
            $pelicula->actores()->attach($request->actores);
        }

        if ($request->has('categorias') && is_array($request->categorias)) {
            $pelicula->categorias()->attach($request->categorias);
        }

        try {
            return response()->json([
                'message' => 'Película creada correctamente',
                'pelicula' => $pelicula
            ], 201);

        } catch (QueryException $ex) {
            return response()->json([
                'error' => Utilitat::errorMessage($ex)
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $pelicula = Pelicula::with(['actores'])->find($id);

        if (!$pelicula) {
            abort(404, 'Película no encontrada');
        }

        return view('pelicula.index', ['pelicula' => $pelicula]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        try {
                $pelicula->titulo = $request->input("titulo");
            $pelicula->image = $request->input("image");
            $pelicula->descripcion = $request->input("descripcion");
            $pelicula->duracion = $request->input("duracion");
            $pelicula->restriccion_edad = $request->input("restriccion_edad");
            $pelicula->calificacion = $request->input("calificacion");
            $pelicula->idioma = $request->input("idioma");
            $pelicula->fecha_estreno = $request->input("fecha_estreno");
            $pelicula->pelicula_src = $request->input("pelicula_src");
            $pelicula->save();

            $pelicula->actores()->detach();
        if ($request->has('actores') && is_array($request->actores)) {
            $pelicula->actores()->attach($request->actores);
        }
        $pelicula->categorias()->detach();
        if ($request->has('categorias') && is_array($request->categorias)) {
            $pelicula->categorias()->attach($request->categorias);
        }
            return response()->json(['message' => 'Pelicula actualizada correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        try {
            $pelicula->actores()->detach();
            $pelicula->categorias()->detach();
            $pelicula->delete();

            return response()->json([
                'message' => 'Película eliminada correctamente'
            ], 200);

        } catch (QueryException $ex) {
            return response()->json([
                'error' => Utilitat::errorMessage($ex)
            ], 500);
        }
    }
}
