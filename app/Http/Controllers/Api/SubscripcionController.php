<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SubscripcionResource;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Subscripcion;

class SubscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Subscripcion::all());
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
        return new SubscripcionResource($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscripcion $subscripcion)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscripcion $subscripcion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscripcion $subscripcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscripcion $subscripcion)
    {
        //
    }
}
