<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function rol(){
        return $this->belongsTo(Rol::class, 'id');
    }
}
