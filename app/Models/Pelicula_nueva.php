<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula_nueva extends Model
{
    use HasFactory;

    protected $table = 'pelicula_nueva';

    protected $primaryKey = 'id';

    public $timestamps = false;


    public function actor(){
        return $this->belongsToMany('App\Models\Actor', 'actor_pelicula_nueva', 'pelicula_nueva_id', 'actor_id');
    }

    public function evento_pelicula(){
        return $this->belongsToMany('App\Models\Evento', 'evento_pelicula_nueva', 'pelicula_nueva_id', 'evento_id');
    }

    public function cartelera(){
        return $this->belongsToMany('App\Models\Cartelera', 'cartelera_pelicula_nueva', 'pelicula_nueva_id', 'cartelera_id');
    }
}
