<?php

namespace App\Http\Livewire;

use App\Models\DetalleFactura;
use App\Models\Factura;
use Livewire\Component;
use PDF;
class ShowFactura extends Component
{
   // public $readyToLoad = false;
  //  protected $listeners = ['render' => 'render'];
   /*  public function loadPage()
    {
      $this->readyToLoad = true;
    } */
    public function imprimir($id){
    
        $factura = Factura::where('id',$id)->get();
        view()->share('factura', $factura);
        $detalles = DetalleFactura::where('factura_id',$id)->get();
        $pdf = PDF::loadView('livewire.print-factura',compact('factura','detalles'));
        return $pdf->stream();
      //  return $pdf->download('archivo-pdf.pdf');
    }
    public function render()
    {

        $facturas=Factura::orderBy('id','desc')->get();
        return view('livewire.show-factura',compact('facturas'));
    }
}
