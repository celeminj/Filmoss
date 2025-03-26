<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartelera extends Model
{
    use HasFactory;

    protected $table = 'cartelera';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function pelicula_nueva(){
        return $this->belongsToMany('App\Models\Pelicula_nueva', 'cartelera_peliculas_nueva', 'cartelera_id', 'pelicula_nueva_id');
    }

    public function usuario(){
        return $this->belongsToMany('App\Models\Usuario', 'acceder_cartelera', 'cartelera_id', 'usuario_id');
    }
}
