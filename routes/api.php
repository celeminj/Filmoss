<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\CineController;
use App\Http\Controllers\Api\ActorController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\PeliculaController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\SubscripcionController;
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
Route::middleware('auth:sanctum')->get('/perfil', function () {
    return auth()->user();
});


Route::apiResource('rol', RolController::class);
Route::apiResource('usuario', UsuarioController::class);
Route::apiResource('pelicula_nueva', PeliculaNuevaController::class);
Route::apiResource('pelicula', PeliculaController::class);
Route::apiResource('evento_pelicula', EventoPeliculaController::class);
Route::apiResource('cine', CineController::class);
Route::apiResource('actor', ActorController::class);
Route::apiResource('categoria', CategoriaController::class);
Route::apiResource('subscripcion', SubscripcionController::class);
Route::apiResource('chat', ChatController::class);

Route::get('categorias/{id}/peliculas', [CategoriaController::class, 'pelisPorCategoria']);

Route::get('/chat/evento/{eventoId}', [ChatController::class, 'porEvento']);

Route::get('/pelicula_nueva/{peliculaId}/{hora}/{eventoId}/chat', [ChatController::class, 'obtenerMensajes']);

Route::post('/pelicula_nueva/{peliculaId}/{hora}/{eventoId}/chat', [ChatController::class, 'almacenarMensaje']);


Route::get('/chat/{peliculaId}/{hora}', [ChatController::class, 'obtenerChatPorPeliculaYHora']);
