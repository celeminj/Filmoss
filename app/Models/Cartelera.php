<?php

namespace App\Models;

use App\Models\Usuario;
use App\Models\Pelicula_nueva;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cartelera extends Model
{
    use HasFactory;

    protected $table = 'cartelera';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function pelicula_nueva(){
        return $this->belongsToMany(Pelicula_nueva::class, 'cartelera_peliculas_nueva', 'cartelera_id', 'pelicula_nueva_id');
    }

    public function usuario(){
        return $this->belongsToMany(Usuario::class, 'acceder_cartelera', 'cartelera_id', 'usuario_id');
    }
}
