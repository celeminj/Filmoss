<?php

namespace App\Models;

use App\Models\Pelicula;
use App\Models\Pelicula_nueva;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actor';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pelicula(){
        return $this->belongsToMany(Pelicula::class, 'actor_pelicula', 'actor_id', 'pelicula_id');
    }
    public function pelicula_nueva(){
        return $this->belongsToMany(Pelicula_nueva::class, 'actor_pelicula_nueva', 'actor_id', 'pelicula_nueva_id');
    }
}
