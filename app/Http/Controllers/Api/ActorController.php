<?php

namespace App\Http\Controllers\Api;

use App\Models\Actor;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

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
           'imagen' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {

            $file = $request->file('imagen');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('public/imagenes', $fileName);

            $rutaPublica = 'storage/imagenes/' . $fileName;

                $actor = new Actor();
                $actor->nombre = $request->input("nombre");
                 $actor->apellido = $request->input("apellido");
                 $actor->imagen = $rutaPublica;

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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        try {
            $actor->nombre = $request->input("nombre");
            $actor->apellido = $request->input("apellido");

            if ($request->hasFile('imagen')) {
                if ($actor->imagen) {
                    Storage::delete($actor->imagen);
                }

                $file = $request->file('imagen');
                $fileName = 'actor-' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/imagenes', $fileName);

                $actor->imagen = 'storage/imagenes/' . $fileName;
            }
            
            if ($request->has('pelicula_id')) {
                $actor->pelicula()->sync($request->input('pelicula_id')); 
            }

            if ($request->has('pelicula_nueva_id')) {
                $actor->pelicula_nueva()->sync($request->input('pelicula_nueva_id')); 
            }

            $actor->save();

            return response()->json(['message' => 'Actor actualizado correctamente', 'actor' => $actor], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        try {
            $actor->pelicula()->detach();
            $actor->pelicula_nueva()->detach();

            if ($actor->imagen) {
                Storage::delete($actor->imagen); 
            }
    
            $actor->delete();
    
            return response()->json(['message' => 'Actor eliminado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
    
}
