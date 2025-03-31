<?php

namespace App\Models;

use App\Models\Usuario;
use App\Models\Pelicula_nueva;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Pelicula;

class Evento_pelicula extends Model
{
    use HasFactory;

    protected $table = 'evento_pelicula';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pelicula_nueva(){
        return $this->belongsToMany(Pelicula_nueva::class, 'evento_pelicula_nueva', 'evento_pelicula_id', 'pelicula_nueva_id');
    }

    public function usuarioAsiste(){
        return $this->belongsToMany(Usuario::class, 'asiste_evento_pelicula', 'evento_pelicula_id', 'usuario_id');
    }

    public function usuarioChat(){
        return $this->belongsToMany(Usuario::class, 'chat', 'evento_pelicula_id', 'usuario_id');
    }
}
