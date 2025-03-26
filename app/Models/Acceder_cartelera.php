<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acceder_cartelera extends Model
{
    use HasFactory;

    protected $table = 'acceder_cartelera';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
