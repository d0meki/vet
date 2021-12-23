<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleHistorial extends Model
{
    use HasFactory;
    protected $fillable = [
        'temperatura_cent',
        'peso_gramos',
        'sintomas',
        'diagnostico',
        'mascota_id',
        'servicio_id',
    ];
    public function mascotas() {
        return $this->belongsTo(Mascota::class);
    }
    public function servicios(){
        return $this->belongsTo(Servicio::class); 
    }
}
