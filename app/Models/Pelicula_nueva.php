<?php

namespace App\Models;

use App\Models\Actor;
use App\Models\Cartelera;
use App\Models\Evento_pelicula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelicula_nueva extends Model
{
    use HasFactory;

    protected $table = 'pelicula_nueva';

    protected $primaryKey = 'id';

    public $timestamps = false;


    public function actor(){
        return $this->belongsToMany(Actor::class, 'actor_pelicula_nueva', 'pelicula_nueva_id', 'actor_id');
    }

    public function evento_pelicula(){
        return $this->belongsToMany(Evento_pelicula::class, 'evento_pelicula_nueva', 'pelicula_nueva_id', 'evento_id');
    }

    public function cartelera(){
        return $this->belongsToMany(Cartelera::class, 'cartelera_pelicula_nueva', 'pelicula_nueva_id', 'cartelera_id');
    }
}
