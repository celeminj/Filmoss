<?php

namespace App\Http\Controllers\Api;

use App\Models\Actor;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;

class ActorController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Actor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'imagen' => 'required|string|max:255'
        ]);

        $actor = new Actor();
        $actor->nombre = $request->input("nombre");
            $actor->apellido = $request->input("apellido");
            $actor->imagen = $request->input("imagen");


        try {
            $actor->save();

            return response()->json([
                'message' => 'Actor creado correctamente',
                'actor' => $actor
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
    public function show(Actor $actor)
    {
        return new ActorResource($actor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        try {

            $actor->nombre = $request->input("nombre");
            $actor->apellido = $request->input("apellido");
            $actor->imagen = $request->input("imagen");

                $actor->save();
            return response()->json(['message' => 'Actor actualizado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        try {
            $actor->delete();
            return response()->json(['message' => 'Actor eliminado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }
}
