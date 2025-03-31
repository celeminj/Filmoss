<?php

namespace App\Models;

use App\Models\Rol;
use App\Models\Pelicula;
use App\Models\Subscripcion;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function rol(){
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    public function pelicula(){
        return $this->belongsToMany(Pelicula::class, 'ver_pelicula', 'usuario_id', 'pelicula_id');
    }

    public function subscripcion(){
        return $this->belongsToMany(Subscripcion::class, 'subscripcion_usuario', 'usuario_id', 'subscripcion_id');
    }
}
