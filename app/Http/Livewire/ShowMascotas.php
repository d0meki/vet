<?php

namespace App\Http\Livewire;

use App\Models\Mascota;
use Livewire\Component;

class ShowMascotas extends Component
{
    public $readyToLoad = false;
    public function loadPage()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        if ($this->readyToLoad) {
           
        }
        $pets = Mascota::orderBy('id','desc')->get();
        return view('livewire.show-mascotas',compact('pets'));
    }
}
