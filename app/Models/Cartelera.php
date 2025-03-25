<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartelera extends Model
{
    use HasFactory;

    protected $table = 'cartelera';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
