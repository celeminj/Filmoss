<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscripcion extends Model
{
    use HasFactory;

    protected $table = 'subscripcion';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function usuario(){
        return $this->belongsToMany(Usuario::class, 'subscripcion_usuario', 'subscripcion_id', 'usuario_id');
    }
}
