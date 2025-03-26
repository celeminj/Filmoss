<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\PeliculaController;
use App\Http\Controllers\Api\PeliculaNuevaController;
use App\Http\Controllers\Api\EventoPeliculaController;

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


Route::apiResource('rol', RolController::class);
Route::apiResource('usuario', UsuarioController::class);
Route::apiResource('pelicula_nueva', PeliculaNuevaController::class);
Route::apiResource('pelicula', PeliculaController::class);
Route::apiResource('evento_pelicula', EventoPeliculaController::class);



