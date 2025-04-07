<?php

namespace App\Models;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categoria_pelicula(){
        return $this->belongsToMany(Pelicula::class, 'categoria_pelicula', 'categoria_id', 'pelicula_id');
    }
}
