<?php

use App\Models\Usuario;
use App\Models\Pelicula;

use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Api\CineController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\PeliculaController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\PeliculaNuevaController;
use App\Http\Controllers\Api\EventoPeliculaController;

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



Route::get('/ticket', function () {
    return view('ticket.ticket');
})->name('ticket');



Route::get('/pelicula_nueva', [PeliculaNuevaController::class, 'index']);

Route::get('/pelicula', function(){
    return view('pelicula_nueva.index');
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

Route::get('/gestion_actores', function(){
    return view('gestion.gestion_actor');
})->name('gestion.gestion_actor');


Route::get('/categoria', function(){
    return view('categoria.categoria');
})->name('categoria.categoria');


Route::get('/gestion_categoria', function(){
    return view('gestion.gestion_categoria');
})->name('gestion.gestion_categoria');

Route::get('/cines', function () {
    $cines = App\Models\Cine::all();
    return view('cine.cine', ['cines' => $cines]);
})->name('cine');



Route::get('/ticket/{id}/{hora}', function ($id, $hora) {
    $pelicula = App\Models\Pelicula_nueva::findOrFail($id);

    $evento = App\Models\Evento_pelicula::whereHas('evento_pelicula_nueva', function ($q) use ($id) {
        $q->where('pelicula_nueva_id', $id);
    })->first();

    return view('ticket.ticket', [
        'pelicula' => $pelicula,
        'hora' => $hora,
        'evento' => $evento
    ]);
})->name('ticket');


Route::get('/pelicula_nueva/{pelicula_nueva}/{hora}/{evento_id}', [PeliculaNuevaController::class, 'show'])->name('pelicula.show');


Route::put('/evento_pelicula/{evento_pelicula}', [EventoPeliculaController::class, 'update'])->name('evento_pelicula.update');

Route::get('/pelicula/{id}', [PeliculaController::class, 'show'])->name('peliculas.show');


Route::get('/categoria/{id}', function ($id) {
    $categoria = Categoria::with('categoria_pelicula')->findOrFail($id);
    return view('categoria.categoria', compact('categoria'));
})->name('web.categoria');


Route::get('/pago', function(){
    return view('metodo_pago.metodo_pago');
})->name('metodo_pago.metodo_pago');

Route::get('/estadisticas', function () {
    return view('gestion.estadisticas');
})->name('estadisticas');


Route::get('/perfil/{id}', function ($id) {
    $usuario = Usuario::find($id);
    return view('perfil.index', compact('usuario'));

})->name('perfil');

Route::post('/enviar-ticket', [TicketController::class, 'enviar'])->name('ticket.enviar');
