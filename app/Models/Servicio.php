<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'tipo_id',
        'personal',
        'user_id',
        'costo',
        'jaula_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function tipo(){
        return $this->belongsTo(Tipos::class);
    }
    public function jaula(){
        return $this->belongsTo(Jaula::class);
    }
    public function recurso(){
        return $this->belongsTo(Recurso::class);
    }

    
  
}

