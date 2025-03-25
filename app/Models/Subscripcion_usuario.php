<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscripcion_usuario extends Model
{
    use HasFactory;
    protected $table = 'subscripcion_usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
