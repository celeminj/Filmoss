<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Models\Evento_pelicula;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class EventoPeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Evento_pelicula::with('evento_pelicula_nueva')->get());
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


        $evento_pelicula = new Evento_pelicula();
        $evento_pelicula->titulo_evento = $request->input("titulo_evento");
        $evento_pelicula->fecha_inicio = $request->input("fecha_inicio");
        $evento_pelicula->fecha_final = $request->input("fecha_final");

        $evento_pelicula->save();

        if ($request->has('evento_pelicula_nueva') && is_array($request->evento_pelicula_nueva)) {
            $evento_pelicula->evento_pelicula_nueva()->attach($request->evento_pelicula_nueva);
        }

        try {
            return response()->json([
                'message' => 'Evento creado correctamente',
                'evento_pelicula' => $evento_pelicula
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
        try {
            $evento_pelicula = Evento_pelicula::with('evento_pelicula_nueva')->findOrFail($id);

            return response()->json($evento_pelicula);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Evento de película no encontrado'], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento_pelicula $evento_pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento_pelicula $evento_pelicula)
    {
        try {
            $evento_pelicula->titulo_evento = $request->input("titulo_evento");
            $evento_pelicula->fecha_inicio = $request->input("fecha_inicio");
            $evento_pelicula->fecha_final = $request->input("fecha_final");

            $evento_pelicula->save();

            if ($request->has('evento_pelicula_nueva') && is_array($request->evento_pelicula_nueva)) {
                $evento_pelicula->evento_pelicula_nueva()->attach($request->evento_pelicula_nueva);
            }
            return response()->json(['message' => 'Evento actualizado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento_pelicula $evento_pelicula)
    {
        try {
            // Eliminar los registros en ver_evento relacionados
            $evento_pelicula->evento_pelicula_nueva()->detach();

            // Ahora eliminar el evento_pelicula
            $evento_pelicula->delete();

            return response()->json([
                'message' => 'Evento eliminada correctamente'
            ], 200);

        } catch (QueryException $ex) {
            return response()->json([
                'error' => Utilitat::errorMessage($ex)
            ], 500);
        }
    }

}
