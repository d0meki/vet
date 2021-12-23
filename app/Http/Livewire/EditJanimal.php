<?php

namespace App\Http\Livewire;

use App\Helpers\BitacoraHelper;
use App\Models\Jaula;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditJanimal extends Component
{
    use WithFileUploads;
    public $open = false;
    public $janimal, $image,$identificador;

    protected $rules = [
      'janimal.nombre' =>'required',
      'janimal.descripcion' => 'required',
    ];
    
    public function mount(Jaula $janimal){
      $this->janimal = $janimal;
      $this->identificador =rand();
    }

    public function save(){
      $this->validate();

      if($this->image){
        Storage::delete([$this->janimal->image]);
       
       $this->janimal->image = $this->image->store('imagenes');
      }

      $this->janimal->save();

      $this->reset(['open','image']);
      $this->identificador = rand();

      $this->emitTo('jaula','render');
      BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' edito info de jaula');
     $this->emit('alert','la jaula se actualizo exitosamente');

    }
    public function render()
    {
        return view('livewire.edit-janimal');
    }
}
