<?php
namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Models\Cine;
use App\Http\Controllers\Controller;
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
        return response()->json($cine);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cine $cine)
    {
        //
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

            return response()->json([
                'message' => 'Cine actualizado correctamente',
                'cine' => $cine
            ], 200);
        } catch (QueryException $ex) {
            return response()->json([
                'error' => Utilitat::errorMessage($ex)
            ], 500);
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
            return response()->json([
                'error' => Utilitat::errorMessage($ex)
            ], 500);
        }
    }
}
