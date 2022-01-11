<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecervaController extends Controller
{
    public function reservado(Request $request)
    {

        $reserva = Reserva::create($request->all());
        $data = "marinaa";
        return response()->json($data, 200);
        //valdiate
      /*  $rules = [
            
            'nombred' => 'required|string',
            'direccion' => 'required|string',
        
            'email' => 'required|string',
            'nombrem' => 'required|string',
            'tipo' => 'required|string',
            'raza' => 'required|string',
        
            'sexo' => 'required|string',
            
        ];

        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //create new user in users table
        $reserva = Reserva::create([
            
            'nombred'=> $req->nombred,
            'direccion' => $req->direccion,
            
            'email' => $req->email,
            'nombrem' => $req->nombrem,
            'tipo' => $req->tipo,
            'raza' => $req->raza,
            
            'sexo' => $req->sexo
            
        ]);
        $token = $reserva->createToken('Personal Access Token')->plainTextToken;
        $response = ['reserva' => $reserva, 'token' => $token];
        return response()->json($response, 200);*/
    }


}
