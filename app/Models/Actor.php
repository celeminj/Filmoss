<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'actor';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function pelicula(){
        return $this->belongsToMany('App\Models\Pelicula', 'actor_pelicula', 'actor_id', 'pelicula_id');
    }
    public function pelicula_nueva(){
        return $this->belongsToMany('App\Models\Pelicula_nueva', 'actor_pelicula_nueva', 'actor_id', 'pelicula_nueva_id');
    }
}
