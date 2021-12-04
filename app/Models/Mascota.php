<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'tipo',
        'raza',
        'sexo',
        'caracteristicas',
        'image',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
