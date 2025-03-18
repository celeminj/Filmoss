<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\PeliculaNuevaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('home', function () {
    return view('home.index');
});

Route::get('/cartelera', function () {
    return view('cartelera.cartelera');
});

Route::get('/cine', function () {
    return view('cine.cine');
});

// Login y registro son probisionales para style
Route::get  ('/register', function () {
    return view('auth.register');
});

Route::get  ('/login', function () {
    return view('auth.login');
});

Route::get('/catalogo', [PeliculaController::class, 'index']);


Route::get('/pelicula_nueva', [PeliculaNuevaController::class, 'index']);

