<?php

namespace App\Http\Controllers;

use App\Models\Tipos;
use Illuminate\Http\Request;

class ApiTipoServiciosController extends Controller
{
    public function index(){
        return Tipos::all();
    }
    
}
