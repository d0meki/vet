<?php

namespace App\Http\Livewire;

use App\Models\Receta;
use App\Models\Recurso;
use App\Models\Servicio;
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
        $this->reset(['nombre_recurso','serie','open_recursos','id_servicio','costo_recurso']);
        $this->emit('alert','El recurso se agrego satisfactoriamente');
    }
    public function crearRecetas(Servicio $servicio){
        
        $this->open_recetas = true;
        $this->id_servicio = $servicio->id;
    }
    public function saveRecetas(){
        Receta::create([
            'fecha' => date('m-d-Y h:i:s a', time()),
            'nombre_medicamento' => $this->nombre_medicamento,
            'dosis' => $this->dosis,
            'servicio_id' => $this->id_servicio
        ]);
        $this->reset(['nombre_medicamento','dosis','open_recetas','id_servicio']);
        $this->emit('alert','La receta se agrego satisfactoriamente');
    }
    
    public function delete(Servicio $servicio){
        $servicio ->delete(); 
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
