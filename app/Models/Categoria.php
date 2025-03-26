<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pelicula (){
        return $this->belongsToMany('App\Models\Pelicula', 'categoria_pelicula', 'categoria_id', 'pelicula_id');
    }
}
