<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';

    protected $primaryKey = ['usuario_id', 'evento_pelicula_id'];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function evento_pelicula()
    {
        return $this->belongsTo(Evento_pelicula::class, 'evento_pelicula_id');
    }

}
