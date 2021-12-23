<?php

namespace App\Http\Livewire;

use App\Helpers\BitacoraHelper;
use App\Models\Receta;
use App\Models\Recurso;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowAddservicio extends Component
{
    public $readyToLoad = false;
    public $open_recursos = false;
    public $open_recetas = false;
    public $id_servicio,$nombre_recurso,$serie,$costo_recurso;
    public $fecha,$nombre_medicamento,$dosis;
    protected $listeners = ['render' => 'render','delete'];
 

    public function loadPage()
    {
      $this->readyToLoad = true;
    }
    public function crearRecursos(Servicio $servicio){
        //dd($id);
        $this->open_recursos = true;
        $this->id_servicio = $servicio->id;
    }
    public function saveRecursos(){
        Recurso::create([
            'nombre' => $this->nombre_recurso,
            'serie' => $this->serie,
            'servicio_id' => $this->id_servicio,
            'costo' => $this->costo_recurso
        ]);
        BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' agrego recurso: '.$this->nombre_recurso);
        $this->reset(['nombre_recurso','serie','open_recursos','id_servicio','costo_recurso']);
        $this->emit('alert','El recurso se agrego satisfactoriamente');
    }
    public function crearRecetas(Servicio $servicio){
        
        $this->open_recetas = true;
        $this->id_servicio = $servicio->id;
    }
    public function saveRecetas(){
        Receta::create([
            'nombre_medicamento' => $this->nombre_medicamento,
            'dosis' => $this->dosis,
            'servicio_id' => $this->id_servicio
        ]);
        BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' inserto medicamento: '.$this->nombre_medicamento);
        $this->reset(['nombre_medicamento','dosis','open_recetas','id_servicio']);
        $this->emit('alert','La receta se agrego satisfactoriamente');
    }
    
    public function delete(Servicio $servicio){
        $servicioN=Servicio::find($servicio->id)->nombre;
        $servicio ->delete(); 
        BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' elimino servicio: '.$servicioN);
    }
    public function render()
    {
        if ($this->readyToLoad) {
            $serv = Servicio::orderBy('id','desc')->get();
        }else{
            $serv = [];
        }
        return view('livewire.show-addservicio',compact('serv'));
    }
}
