<?php

namespace App\Http\Controllers\Api;

use App\Clases\Utilitat;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Categoria::with(['categoria_pelicula'])->get());
    }

    public function pelisPorCategoria($id_cat)
    {
        $categoria = Categoria::with('categoria_pelicula')->find($id_cat);

        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria->categoria_pelicula);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required|string|max:200',
            'image' => 'required|string|max:255',
        ]);

        $categoria = new Categoria();
         $categoria->categoria = $request->input("categoria");
            $categoria->image = $request->input("image");


        try {
            $categoria->save();

            return response()->json([
                'message' => 'Categoria creado correctamente',
                'categoria' => $categoria
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
    public function show(Categoria $categoria,$id)
    {
        try {

            $categoria = Categoria::with('categoria_pelicula')->findOrFail($id);

            return view('categoria.ver', compact('categoria'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Categoria no encontrado'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria,$id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->categoria = $request->input("categoria");
            $categoria->image = $request->input("image");

            $categoria->save();

            if ($request->has('categoria_pelicula') && is_array($request->categoria_pelicula)) {
                $categoria->categoria_pelicula()->attach($request->categoria_pelicula);
            }
            return response()->json(['message' => 'Categoria actualizado correctamente'], 200);
        } catch (QueryException $ex) {
            return response()->json(['error' => Utilitat::errorMessage($ex)], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria,$id)
    {
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->categoria_pelicula()->detach();

            $categoria->delete();

            return response()->json([
                'message' => 'Categoria eliminada correctamente'
            ], 200);

        } catch (QueryException $ex) {
            return response()->json([
                'error' => Utilitat::errorMessage($ex)
            ], 500);
        }
    }
}

