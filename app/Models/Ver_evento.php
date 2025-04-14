<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ver_evento extends Model
{
    use HasFactory;
    protected $table = 'ver_evento';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function evento_pelicula()
{
    return $this->belongsTo(Evento_pelicula::class, 'evento_pelicula_id');
}

public function pelicula_nueva()
{
    return $this->belongsTo(Pelicula_nueva::class, 'pelicula_nueva_id');
}

}
