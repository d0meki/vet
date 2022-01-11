<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombred',
        'direccion',
        
        'email',
        'nombrem',
        'tipo',
        'raza',
        
        'sexo',
    ];
}
