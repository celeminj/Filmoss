<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento_pelicula extends Model
{
    use HasFactory;

    protected $table = 'evento_pelicula';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pelicula_nueva(){
        return $this->belongsToMany('App\Models\Pelicula_nueva', 'evento_pelicula_nueva', 'evento_pelicula_id', 'pelicula_nueva_id');
    }

    public function usuario(){
        return $this->belongsToMany('App\Models\Usuario', 'asiste_evento_pelicula', 'evento_pelicula_id', 'usuario_id');
    }

    public function usuario(){
        return $this->belongsToMany('App\Models\Usuario', 'chat', 'evento_pelicula_id', 'usuario_id');
    }
}
