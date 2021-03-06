<?php

use App\Http\Controllers\BackupController;
use App\Http\Livewire\AddHistorial;
use App\Http\Livewire\CreateFactura;
use App\Http\Livewire\IndexServicio;
use App\Http\Livewire\Jaula;
use App\Http\Livewire\ListVacunas;
use App\Http\Livewire\Mascota;
use App\Http\Livewire\Mascotas;
use App\Http\Livewire\Recetas;
use App\Http\Livewire\ShowAddservicio;
use App\Http\Livewire\ShowFactura;
use App\Http\Livewire\ShowMascotas;
use App\Http\Livewire\ShowUsuarios;
use App\Http\Livewire\VerRecursos;
use Facade\Ignition\ErrorPage\Renderer;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Reportes;
use App\Http\Livewire\Bitacora;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* Route::get('/mascotas',[Mascota::class, 'render']); */

Route::get('/mismascotas', function () {
    return view('showpet');
});

Route::get('/mismascotas',Mascotas::class)->name('show.mascotas');
Route::get('/usuarios/{rol}',ShowUsuarios::class)->name('show.usuarios');/*  */
Route::get('/jaulas',Jaula::class)->name('show.jaulas');
Route::get('/servicios', IndexServicio::class)->name('index.servicios');
/* Route::get('/recetas', Recetas::class)->name('show.recetas'); */
Route::get('/mascotas', ShowMascotas::class)->name('show.pets');
Route::get('/addservicios', ShowAddservicio::class)->name('show.addservicios');

Route::get('/factura', ShowFactura::class)->name('show.factura');

Route::get('/listvacuna', ListVacunas::class)->name('show.listvacuna');
Route::get('/imprimirvacuna/{id}', [ListVacunas::class, 'generatePDF'])->name('ver.carnet');
Route::get('/carnet/{id}', [Mascotas::class, 'generarCarnet'])->name('ver.carnetMascota');
Route::get('/historial/{id}', [Mascotas::class, 'generarHistorial'])->name('ver.historialMascota');


Route::get('/reportes', Reportes::class)->name('index.reportes');
Route::get('/bitacora', Bitacora::class)->name('index.bitacora');

//Route::get('/backup','App\Http\Controllers\BackupController@store')->name('backup.store');
Route::get('/backup',[BackupController::class,'store'])->name('backup.store');

Route::get('/imprimir/{id}', [VerRecursos::class , 'imprimir'])->name('ver.receta');
Route::get('/addhistorial', AddHistorial::class)->name('show.addhistorial');

Route::get('/print/{id}', [ShowFactura::class , 'imprimir'])->name('ver.factura');

Route::get('/servicioreporte','App\Http\Controllers\ReportesController@GenerarReporteServicios')
    ->name('show.reportes_servicios');
       
Route::get('/bitacorareporte','App\Http\Controllers\ReportesController@GenerarReporteBitacora')
    ->name('show.reportes_bitacora');




Route::get('/CarnetVacunacion','App\Http\Controllers\CarnetVacunacionController@index')
    ->name('CarnetVacunacion.index');
Route::get('/CarnetVacunacion/create','App\Http\Controllers\CarnetVacunacionController@create')
    ->name('CarnetVacunacion.create');
Route::post('CarnetVacunacion','App\Http\Controllers\CarnetVacunacionController@store')
    ->name('CarnetVacunacion.store');
Route::get('CarnetVacunacion/{id}','App\Http\Controllers\CarnetVacunacionController@show')
    ->name('CarnetVacunacion.show');
Route::get('CarnetVacunacion/{id}/edit','App\Http\Controllers\CarnetVacunacionController@edit')
    ->name('CarnetVacunacion.edit');
Route::put('CarnetVacunacion/{id}','App\Http\Controllers\CarnetVacunacionController@update')
    ->name('CarnetVacunacion.update');
Route::delete('CarnetVacunacion/{id}','App\Http\Controllers\CarnetVacunacionController@destroy')
    ->name('CarnetVacunacion.destroy');