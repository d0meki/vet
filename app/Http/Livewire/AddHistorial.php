<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Servicio;
use App\Models\Mascota;
use App\Models\DetalleHistorial;

class AddHistorial extends Component
{
    public $isModal = false;
    public $servicios, $mascotas, $detallehistorial, $mascota_id = 0;
    public $temperatura, $peso, $sintomas, $diagnostico, $servicio_id, $detalle_id;


    public function render()
    {
        $this->servicios = Servicio::where('servicios.mascota_id', $this->mascota_id)->get();
        $this->mascotas = Mascota::all();
        $this->detallehistorial = DetalleHistorial::where('detalle_historials.mascota_id', $this->mascota_id)
            ->select(
                'detalle_historials.id',
                'detalle_historials.temperatura_cent',
                'detalle_historials.peso_gramos',
                'detalle_historials.sintomas',
                'detalle_historials.diagnostico',
                'servicios.nombre AS nombre_servicio',
                'detalle_historials.created_at',
                'detalle_historials.updated_at',
            )
            ->join('servicios', 'detalle_historials.servicio_id', '=', 'servicios.id')
            ->get();
        return view('livewire.add-historial');
    }

    public function create()
    {
        $this->openModal();
        $this->resetForm();
        $this->servicios = Servicio::all();
    }
    public function openModal()
    {
        $this->isModal = true;
    }
    public function closeModal()
    {
        $this->isModal = false;
    }
    public function resetForm()
    {
        $this->temperatura = '';
        $this->peso = '';
        $this->sintomas = '';
        $this->diagnostico = '';
        $this->servicio_id = '';
    }
    public function store()
    {
        $this->validate([
            'temperatura' => 'required',
            'peso' => 'required',
            'sintomas' => 'required',
            'diagnostico' => 'required',
            'servicio_id' => 'required',
        ]);
        DetalleHistorial::updateOrCreate(['id' => $this->detalle_id], [
            'temperatura_cent' => $this->temperatura,
            'peso_gramos' => $this->peso,
            'sintomas' => $this->sintomas,
            'diagnostico' => $this->diagnostico,
            'mascota_id' => $this->mascota_id,
            'servicio_id' => $this->servicio_id,
        ]);
        $this->closeModal();
        $this->resetForm();
    }
    public function edit($id)
    {
        $detalle = DetalleHistorial::findOrFail($id);
        $this->detalle_id = $id;
        $this->temperatura = $detalle->temperatura_cent;
        $this->peso = $detalle->peso_gramos;
        $this->sintomas = $detalle->sintomas;
        $this->diagnostico = $detalle->diagnostico;
        $this->servicio_id = $detalle->servicio_id;

        $this->openModal();
    }
    public function delete($id)
    {
        DetalleHistorial::find($id)->delete();
    }
}