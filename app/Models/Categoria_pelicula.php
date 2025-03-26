<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria_pelicula extends Model
{
    use HasFactory;

    protected $table = 'categoria_pelicula';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
