<?php

namespace App\Http\Livewire;

use App\Models\Receta;
use Livewire\Component;

class Recetas extends Component
{
    public $receta, $fecha,$nombre_medicamento,$dosis,$id_receta, $id_servicio;
    public $modal=false;
    public function render()
    {
        $this->recetas=Receta::all();
        return view('livewire.recetas');
    }
    public function crear()
    {
       $this->limpiarCampos();
       $this->abrirModal();
    }
    public function abrirModal(){
        $this->modal=true;
    }
    
    public function cerrarModal(){
        $this->modal=false;
    }

    public function limpiarCampos(){
       // $this->id_receta='';
        $this->fecha='';
        $this->nombre_medicamento='';
        $this->dosis='';
        $this->id_servcio='';
    }

    public function editar($id){
        $receta=Receta::findOrFail($id);
        $this->id_receta=$id;
        $this->fecha=$receta->fecha;
        $this->nombre_medicamento=$receta->nombre_medicamento;
        $this->dosis=$receta->dosis;
        $this->id_servicio=$receta->id_servicio;
        $this->abrirModal();
    }

    public function borrar($id){
        Receta::find($id)->delete();
        session()->flash('message', 'Registgro Eliminado Correctamente');
    }

    public function guardar(){
        Receta::updateOrCreate(['id'=>$this->id_receta],
        [
            'fecha'=>$this->fecha,
            'nombre_medicamento'=>$this->nombre_medicamento,
            'dosis'=>$this->dosis,
            'id_servicio'=>$this->id_servicio,
        ]);

        session()->flash('message', 
          $this->id_receta ? '¡Actualizacion Exitosa!' : '¡Alta exitosa!');

        $this->cerrarModal();
        $this->limpiarCampos();


    }
}
