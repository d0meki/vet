<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $validatedData= $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']) 
        ])->assignRole('cliente');
        
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'acces_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email','password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ],401);
        }
    
        $user = User::where('email',$request['email'])->firstOrfail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'acces_token' => $token,
            'token_type' => 'bearer'
        ]);
    }
    public function infoUser(Request $request){

        return $request->user();
        
    }
}
