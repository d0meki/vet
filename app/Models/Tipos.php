<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'costo',
        'imagenurl',
        'status'
    ];
    protected $guarded = [];
    use HasFactory;
}
