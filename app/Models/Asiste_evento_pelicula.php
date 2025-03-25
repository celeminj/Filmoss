<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiste_evento_pelicula extends Model
{
    use HasFactory;
    protected $table = 'asiste_evento_pelicula';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
