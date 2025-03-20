<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\PeliculaNuevaController;
use App\Http\Controllers\RolController;

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



Route::get  ('/ticket', function () {
    return view('ticket.ticket');
});

Route::get('/catalogo', [PeliculaController::class, 'index']);


Route::get('/pelicula_nueva', [PeliculaNuevaController::class, 'index']);

Route::get('/pelicula', function(){
    return view('pelicula.index');
});


Route::get('/gestion_usuario', [UsuarioController::class, 'index'])->name('gestion.gestion_usuario');



Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');

Route::post('/login', [UsuarioController::class, 'login'])->name('login.post');

Route::post('/register', [UsuarioController::class, 'register'])->name('register');

Route::get('/register', [UsuarioController::class, 'showRegister']);

Route::get('/logout', [UsuarioController::class, 'logout']);

Route::middleware(['auth'])->group(function (){
    Route::get('/catalogo' , function () {
        $user = Auth::user();
        return view('catalogo.catalogo' , compact('user'));
    })->name('catalogo');
});
