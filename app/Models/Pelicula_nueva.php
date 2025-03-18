<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula_nueva extends Model
{
    use HasFactory;

    protected $table = 'pelicula_nueva';

    protected $primaryKey = 'id';

    public $timestamps = false;

}
