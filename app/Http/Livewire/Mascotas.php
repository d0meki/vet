<?php

namespace App\Http\Livewire;

use App\Models\Mascota;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class Mascotas extends Component
{
    
    protected $listeners = ['render' => 'render','delete'];
    public function delete(Mascota $mascota){
        Storage::delete([$mascota->image]);
        $mascota->delete();
    }

    public function render()
    {
        $mascotas = Mascota::orderBy('id','desc')->get();
        return view('livewire.mascotas',compact('mascotas'));
    }
}
