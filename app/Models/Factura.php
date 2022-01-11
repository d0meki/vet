<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $fillable=['fecha','nit','nombre','total','metodopago_id'];
    public function metodopago(){
        return $this->belongsTo(MetodoPago::class);
    }

}
