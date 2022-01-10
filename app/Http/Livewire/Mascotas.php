<?php

namespace App\Http\Livewire;

use App\Models\DetalleHistorial;
use App\Models\Mascota;
use App\Models\Recurso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;
use PDF;
class Mascotas extends Component
{
    
    protected $listeners = ['render' => 'render','delete'];
    public function delete(Mascota $mascota){
        Storage::delete([$mascota->image]);
        $mascota->delete();
    }
    public function generarHistorial($id_mascota)
    {
        $historial = DetalleHistorial::select(
            'detalle_historials.temperatura_cent',
            'detalle_historials.peso_gramos',
            'detalle_historials.sintomas',
            'detalle_historials.diagnostico',
            'servicios.nombre AS nombre_servicio',
            'detalle_historials.created_at'
        )
            ->join('servicios', 'servicios.id', '=', 'detalle_historials.servicio_id')
            ->where('detalle_historials.mascota_id', $id_mascota)
            ->get();
        view()->share('historial', $historial);
        $pdf = PDF::loadView('livewire.print-historial', $historial);
        return $pdf->stream('historial.pdf');
        // dd($mascota);
    }
    public function generarCarnet($id_mascota)
    {
        $carnet = Recurso::select(
            'recursos.nombre',
            'recursos.serie',
            'mascotas.nombre AS nombre_mascota',
            'servicios.nombre AS nombre_servicio',
            'recursos.created_at'
        )
            ->join('servicios', 'servicios.id', '=', 'recursos.servicio_id')
            ->join('mascotas', 'mascotas.id', '=', 'servicios.mascota_id')
            ->where('mascotas.id', $id_mascota)
            ->where('recursos.tipo', '=', 'vacuna')
            ->get();
        view()->share('carnet', $carnet);
        $pdf = PDF::loadView('livewire.print-carnet', $carnet);
        return $pdf->stream('carnet.pdf');
    }

    public function render()
    {

        $mascotas = Mascota::where('user_id',Auth::id())
        ->orderBy('id','desc')->get();
        return view('livewire.mascotas',compact('mascotas'));
    }
}
