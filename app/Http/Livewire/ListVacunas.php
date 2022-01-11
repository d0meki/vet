<?php

namespace App\Http\Livewire;

use App\Models\Mascota;
use App\Models\Recurso;
use Livewire\Component;
use PDF;
class ListVacunas extends Component
{
    public $listavacuna, $mascotas, $mascota_id;

    public function render()
    {
        $this->mascotas = Mascota::all();
        $this->listavacuna = Recurso::select(
            'recursos.nombre',
            'recursos.serie',
            'recursos.tipo',
            'servicios.nombre AS nombre_servicio',
            'recursos.created_at',
        )
            ->join('servicios', 'servicios.id', '=', 'recursos.servicio_id')
            ->join('mascotas', 'mascotas.id', '=', 'servicios.mascota_id')
            ->where('mascotas.id', $this->mascota_id)
            ->where('recursos.tipo', '=', 'vacuna')
            ->get();
        return view('livewire.list-vacunas');
    }
    public function generatePDF($id)
    {
        $vacunas = Recurso::select(
            'recursos.nombre',
            'recursos.serie',
            'mascotas.nombre AS nombre_mascota',
            'servicios.nombre AS nombre_servicio',
            'recursos.created_at',
        )
            ->join('servicios', 'servicios.id', '=', 'recursos.servicio_id')
            ->join('mascotas', 'mascotas.id', '=', 'servicios.mascota_id')
            ->where('mascotas.id', $id)
            ->where('recursos.tipo', 'vacuna')
            ->get();
        view()->share('vacunas', $vacunas);
        $pdf = PDF::loadView('livewire.print-vacunas', $vacunas);
        return $pdf->stream();
    }
}
