<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('index.index');
});

Route::get('/cartelera', function () {
    return view('cartelera.cartelera');
});

Route::get('/cine', function () {
    return view('cine.cine');
});

