<?php

namespace App\Models;

use App\Models\Actor;
use App\Models\Usuario;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'pelicula';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function usuario(){
        return $this->belongsToMany(Usuario::class, 'ver_pelicula', 'pelicula_id', 'usuario_id');
    }

    public function categoria_pelicula(){
        return $this->belongsToMany(Categoria::class, 'categoria_pelicula', 'pelicula_id', 'categoria_pelicula_id');
    }

    public function actor_pelicula(){
        return $this->belongsToMany(Actor::class, 'actor_pelicula', 'pelicula_id', 'actor_id');
    }
}
