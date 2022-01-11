<?php

namespace App\Http\Livewire;

use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Servicio;
use Livewire\Component;

class CreateDetalle extends Component
{
    public $open = false;

    public $facturaid, $servicioid, $cantidad;

    public function mount(Factura $factura)
    {

        $this->facturaid = $factura->id;


        // dd($this->facturaid);
    }
    public function save()
    {

        $costos = Servicio::where('nombre', $this->servicioid)->get('costo');


        $idservicio = Servicio::where('nombre', $this->servicioid)->get('id');
        //dd($idpago);
        DetalleFactura::create([
            'factura_id' => $this->facturaid,
            'servicio_id' => $idservicio[0]->id,
            'precio' => $costos[0]->costo
        ]);
        $factura = Factura::find($this->facturaid);

        $factura->total = $factura->total + $costos[0]->costo;

        $factura->save();

        $this->reset(['servicioid',  'cantidad']);
        $this->emit('alert', 'Se agrego el detalle satisfactoriamente');
        $this->emit('render');
    }
    public function render()
    {
        $servicio=Servicio::all();
        return view('livewire.create-detalle',compact('servicio'));
    }
}
