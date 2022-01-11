<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function getmascota(Request $request)
    {
        $id_usuario = $request->id;
        
        $mascotas = Mascota::where('user_id',$id_usuario)
        ->get();
        return response()->json($mascotas, 200);

    }
}
