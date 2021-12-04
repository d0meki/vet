<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'serie',
        'servicio_id',
        'costo'
    ];
    public function servicio(){
        return $this->belongsTo(Servicio::class);
    }
}
