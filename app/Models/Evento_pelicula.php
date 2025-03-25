<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento_pelicula extends Model
{
    use HasFactory;

    protected $table = 'evento_pelicula';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
