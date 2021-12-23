<?php

namespace App\Http\Livewire;

use App\Helpers\BitacoraHelper;
use App\Models\Mascota;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
class CreateMascota extends Component
{

    use WithFileUploads;
    public $nombre,$tipo,$raza,$sexo,$caracteristicas,$image,$identificador;
    public $open = false;
    protected $rules = [
        'nombre' => 'required',
        'tipo' => 'required',
        'raza' => 'required',
        'sexo' => 'required',
        'caracteristicas' => 'required',
        'image' => 'required|image|max:2048'
     ];
    public function mount(){
        $this->identificador = rand();
        $this->mascotas = new Mascota();
    }
    public function save(){

        $this->validate();

        $image = $this->image->store('mascotas');

        Mascota::create([
            'nombre' => $this->nombre,
            'tipo' => $this->tipo,
            'raza' => $this->raza,
            'sexo' => $this->sexo,
            'caracteristicas' => $this->caracteristicas,
            'image' => $image,
            'user_id' => Auth::id()
        ]);
        BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' agrego una mascota');
        $this->reset(['open','nombre','tipo','raza','sexo','caracteristicas','image']);
        $this->identificador = rand();
        $this->emitTo('mascotas','render');
        $this->emit('alert','La mascota se creo satisfactoriamente');
    }
    public function render()
    {
        return view('livewire.create-mascota');
    }
}
