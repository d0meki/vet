<?php

namespace App\Http\Livewire;

use App\Models\DetalleFactura;
use App\Models\Factura;
use Livewire\Component;

class ShowDetalle extends Component
{
    public $facturaid;
    public $open = false;

    public function mount(Factura $factura){
        
        $this->facturaid = $factura->id;
    
       // dd($this->facturaid);
    }
    public function render()
    {
        $detalles=DetalleFactura::where('factura_id',$this->facturaid)->get();
        return view('livewire.show-detalle',compact('detalles'));
    }
}
