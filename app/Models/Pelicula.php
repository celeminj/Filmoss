<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $table = 'pelicula';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function usuario(){
        return $this->belongsToMany('App\Models\Usuario', 'ver_pelicula', 'pelicula_id', 'usuario_id');
    }

    public function categoria_pelicula(){
        return $this->belongsToMany('App\Models\Categoria', 'categoria_pelicula', 'pelicula_id', 'categoria_pelicula_id');
    }

    public function actor_pelicula(){
        return $this->belongsToMany('App\Models\Actor', 'actor_pelicula', 'pelicula_id', 'actor_id');
    }
}
