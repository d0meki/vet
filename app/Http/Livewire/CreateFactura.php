<?php

namespace App\Http\Livewire;

use App\Models\Factura;
use App\Models\MetodoPago;
use Livewire\Component;

class CreateFactura extends Component
{
    public $open = false;

    public $fecha,$nit,$nombre,$total,$metodop;

    public function save(){

        $idpago=MetodoPago::where('nombre',$this->metodop)->get('id');
        //dd($idpago);
        
        Factura::create([

           //'title'=>$this->title,
           //  'content'=>$this->content
             'fecha'=> $this->fecha,
             'nit'=>$this->nit,
             'nombre'=>$this->nombre,
             'total'=>0,
             'metodopago_id'=>$idpago[0]->id

        ]);

        $this->reset(['open','fecha', 'nit', 'nombre', 'total','metodop']);

       // $this->emitTo('show-factura', 'render');
        $this->emit('alert', 'La Factura se creo satisfactoriamente');
    }

    public function render()
    {
        $this->fecha = date('d-m-Y');
        $pago=MetodoPago::all();
        return view('livewire.create-factura',compact('pago'));
    }
}
