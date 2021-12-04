<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable=['fecha','nombre_medicamento','dosis','servicio_id'];
    use HasFactory;
}
