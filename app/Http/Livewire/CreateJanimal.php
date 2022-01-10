<?php

namespace App\Http\Livewire;

use App\Helpers\BitacoraHelper;
use App\Models\Jaula;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
       // 'image' => 'required|image|max:2048'

    ];

    

    public function save(){
            $this->validate();
            if($this->image != null){
                $image = $this->image->store('imagenes');
            }else{
                $image = null;
            }    
        Jaula::create([
            'nombre'=> $this->nombre,
            'descripcion' => $this->descripcion,
            'image' => $image
        ]);
        /* //$user = User::where('id',Auth::id())->get('name')->name;
        $user = Auth::user()->name;

       // $user = $user->name;
        dd($user); */
             BitacoraHelper::insertBitacora('El usuario '. Auth::user()->name .' agrego una jaula');
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
