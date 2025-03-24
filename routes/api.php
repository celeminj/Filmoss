<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\PeliculaNuevaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('usuario', UsuarioController::class);
Route::apiResource('pelicula_nueva', PeliculaNuevaController::class);
