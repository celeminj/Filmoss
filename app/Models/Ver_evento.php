<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ver_evento extends Model
{
    use HasFactory;
    protected $table = 'ver_evento';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
