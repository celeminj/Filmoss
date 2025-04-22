<?php

namespace App\Http\Controllers\Api;

use App\Models\Cine;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CineResource;
use Illuminate\Database\QueryException;

class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Cine::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'longitud' => 'required|numeric',
            'latitud' => 'required|numeric',
            'image' => 'required|string|max:255',
        ]);

        $cine = new Cine();
        $cine->nombre = $request->input("nombre");
        $cine->longitud = $request->input("longitud");
        $cine->latitud = $request->input("latitud");
        $cine->image = $request->input("image");

        try {
            $cine->save();

            return response()->json([
                'message' => 'Cine creado correctamente',
                'cine' => $cine
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
    public function show(Cine $cine)
    {
        return new CineResource($cine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cine $cine)
    {
        try {

            $cine->nombre = $request->input("nombre");
            $cine->longitud = $request->input("longitud");
            $cine->latitud = $request->input("latitud");
            $cine->image = $request->input("image");

                $cine->save();
            return response()->json(['message' => 'Cine actualizado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cine $cine)
    {
        try {
            $cine->delete();
            return response()->json(['message' => 'Cine eliminado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }
}
