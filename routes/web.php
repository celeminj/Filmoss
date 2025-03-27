<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RolController;
use App\Http\Controllers\Api\CineController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\PeliculaController;
use App\Http\Controllers\Api\PeliculaNuevaController;

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

Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::get('/home', function () {
    return view('home.index');
})->name('home');


Route::get('/cartelera', function () {
    return view('cartelera.cartelera');
})->name('cartelera');



Route::get('/cine', function () {
    return view('cine.cine');
})->name('cine');


Route::get('/ticket', function () {
    return view('ticket.ticket');
})->name('ticket');



//Route::get('/catalogo', [PeliculaController::class, 'index']);


Route::get('/pelicula_nueva', [PeliculaNuevaController::class, 'index']);

Route::get('/pelicula', function(){
    return view('pelicula.index');
});

Route::Resource('usuario', UsuarioController::class);

Route::delete('/gestion_usuario/{usuario}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');

Route::get('/gestion_usuario', function () {
    return view('gestion.gestion_usuario');
})->name('gestion.gestion_usuario');


Route::get('/login', [UsuarioController::class, 'showLogin'])->name('login');

Route::post('/login', [UsuarioController::class, 'login'])->name('login.post');

Route::post('/register', [UsuarioController::class, 'register'])->name('register');

Route::get('/register', [UsuarioController::class, 'showRegister']);

Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function (){
    Route::get('/catalogo' , function () {
        $user = Auth::user();
        return view('catalogo.catalogo' , compact('user'));
    })->name('catalogo');
});



// Route::put('/editUsuario/{usuario}', [UsuarioController::class, 'update'])->name('usuario.update');

// Route::get('/editUsuario/{usuario}', [UsuarioController::class, 'index'])->name('usuario.edit');
Route::get('/gestion', function(){
    return view('gestion.gestion');
})->name('gestion.gestion');


Route::get('/gestion_pelicula', function(){
    return view('gestion.gestion_pelicula');
})->name('gestion.gestion_pelicula');

Route::get('/gestion_pelicula_nuevas', function(){
    return view('gestion.gestion_pelicula_nueva');
})->name('gestion.gestion_pelicula_nueva');

Route::get('/gestion_cines', function(){
    return view('gestion.gestion_cine');
})->name('gestion.gestion_cine');


Route::get('/ticket/{id}/{hora}', function ($id, $hora) {
    $pelicula = App\Models\Pelicula_nueva::findOrFail($id);
    return view('ticket.ticket', ['pelicula' => $pelicula, 'hora' => $hora]);
})->name('ticket');

Route::get('/pelicula_nueva/{pelicula_nueva}/{hora}', [PeliculaNuevaController::class, 'show'])->name('pelicula.show');


Route::get('/pelicula/{pelicula}', [PeliculaController::class, 'show'])->name('peliculas.show');

Route::put('/evento_pelicula/{evento_pelicula}', [EventoPeliculaController::class, 'update'])->name('evento_pelicula.update');
