<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor_pelicula extends Model
{
    use HasFactory;

    protected $table = 'actor_pelicula';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
