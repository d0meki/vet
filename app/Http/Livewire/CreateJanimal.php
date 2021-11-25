<?php

namespace App\Http\Livewire;

use App\Models\Jaula;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateJanimal extends Component
{
    use WithFileUploads;
    public $open = false;

    public $nombre, $descripcion , $image,$identificador;

    public function mount(){
        $this->identificador =rand();
    }

    protected $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'image' => 'required|image|max:2048'

    ];

    

    public function save(){
            $this->validate();
            $image = $this->image->store('imagenes');

        Jaula::create([
            'nombre'=> $this->nombre,
            'descripcion' => $this->descripcion,
            'image' => $image
        ]);


            $this->reset(['open','nombre','descripcion','image']);
            $this->identificador = rand();
            $this->emitTo('jaula','render');
            $this->emit('alert','la jaula fue creada exitosamente');


    }
    public function render()
    {
        return view('livewire.create-janimal');
    }
}
