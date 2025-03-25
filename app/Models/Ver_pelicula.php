<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ver_pelicula extends Model
{
    use HasFactory;

    protected $table = 'ver_pelicula';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
