<?php

namespace App\Http\Livewire;

use App\Helpers\BitacoraHelper;
use App\Models\DetalleHistorial;
use App\Models\Mascota;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddHistorial extends Component
{
    public $isModal=false;
    public $servicios, $mascotas, $detallehistorial, $mascota_id=0;
    public $temperatura, $peso, $sintomas, $diagnostico, $servicio_id, $detalle_id;


    public function render()
    {
        $this->servicios = Servicio::all();
        $this->mascotas = Mascota::all();
        $this->detallehistorial = DetalleHistorial::where('mascota_id', $this->mascota_id)->get();
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
        BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' creo historial del servicio con ID: '.$this->servicio_id);
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
        BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' elimino el Historial con ID: '.$id);
    }
}
