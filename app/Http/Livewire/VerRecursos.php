<?php

namespace App\Http\Livewire;

use App\Models\Receta;
use App\Models\Recurso;
use App\Models\Servicio;
use Livewire\Component;
use PDF;
class VerRecursos extends Component
{    
    public $open = false;
    public $servicio;
    public function mount(Servicio $servicio){
        $this->servicio = $servicio;
    }
    public function imprimir($id){
        /* $this->servicio->id */
        $recetas = Receta::where('servicio_id',$id)->get();

        view()->share('recetas', $recetas);

        $pdf = PDF::loadView('livewire.imprimir-receta',compact($recetas));
        return $pdf->stream();
      //  return $pdf->download('archivo-pdf.pdf');
    }
        
    public function render()
    {
        $recetas = Receta::where('servicio_id',$this->servicio->id)->get();
        $recursos = Recurso::where('servicio_id',$this->servicio->id)->get();
        return view('livewire.ver-recursos',compact('recursos','recetas'));
    }
}
