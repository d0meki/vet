<?php

use App\Http\Controllers\ApiTipoServiciosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MascotaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/* Route::post('/reg',[AuthController::class, 'register']);
Route::post('/log',[AuthController::class, 'login']);
Route::post('/userInfo',[AuthController::class, 'infoUser'])->middleware('auth:sanctum');

Route::get('/servicios',[ApiTipoServiciosController::class,'index']); */

Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::get('/servicios',[ServicioController::class,'index']);
Route::post('reserva/create', [ReservaController::class, 'reservado']);
Route::get('mascotas/{id}', [MascotaController::class, 'getmascota']);

