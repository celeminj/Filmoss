<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscripcion extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'subscripcion';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
