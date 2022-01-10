<?php

namespace App\Http\Livewire;

use App\Helpers\BitacoraHelper;
use App\Models\Jaula;
use App\Models\Mascota;
use App\Models\Servicio;
use App\Models\Tipos;
use App\Models\User;
use ArrayObject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAddservicio extends Component
{
    public $open = false;
    public $nombre, $jaula_nombre, $tipo_servicio, $costo, $mascota_name;
    public $user, $jaula;
    public $personal;
    public $query,$query2;
    // public $cliente = '';
    public $cliente = null;
    public $readyToLoad = false;

    /*
    public function updateQuery(){
        $this->clientes = User::where('name','ilike','%'.$this->query.'%')
        ->get()
        ->toArray();
    } */
    protected $rules = [
        'nombre' => 'required',
        'personal' => 'required',
        'tipo_servicio' => 'required',
        'cliente' => 'required',
        'mascota_name' => 'required',
        'costo' => 'required'
        // 'jaula_nombre' => 'required',
    ];
    public function save()
    {
        $this->validate();
        $user_id = User::where('name', $this->cliente)->get('id');
        $tipo_id = Tipos::where('nombre', $this->tipo_servicio)->get('id');
        if ($this->jaula_nombre != null) {
            $jaula_id = Jaula::where('nombre', $this->jaula_nombre)->get('id');
            $jaula_id = $jaula_id[0]->id;
        } else {
            $jaula_id = null;
        }
        $mascota_id = Mascota::where('nombre',$this->mascota_name)->get('id');
        $this->personal = User::where('id', Auth::id())->get('name');

      //  dd($mascota_id[0]->id);
        Servicio::create([
            'nombre' => $this->nombre,
            'tipo_id' => $tipo_id[0]->id,
            'personal' => $this->personal[0]->name,
            'user_id' => $user_id[0]->id,
            'mascota_id' => $mascota_id[0]->id,
            'jaula_id' => $jaula_id,
            'costo' => $this->costo
        ]);
        BitacoraHelper::insertBitacora(Auth::user()->name . ' agrego servicio: ' . $this->nombre);
        $this->reset(['nombre', 'tipo_servicio', 'cliente', 'jaula_nombre', 'personal', 'mascota_name', 'open', 'costo']);
        $this->emitTo('show-addservicio', 'render');
        $this->emit('alert', 'El servicio se agrego satisfactoriamente');
    }
    public function loadPage()
    {
        $this->readyToLoad = true;
    }
    public function render()
    {
        $tipos = Tipos::all();
        $this->personal = User::where('id', Auth::id())->get('name');
        $this->personal = $this->personal[0]->name;
        $jaulas = Jaula::all();

        if ($this->readyToLoad) {

            $this->query = User::where('name', 'ilike', '%' . $this->cliente . '%')->get();
            $this->query2 = Mascota::where('nombre', 'ilike', '%' . $this->mascota_name . '%')->get();
        } else {
            $this->query = [];
            $this->query2 = [];
        }

        return view('livewire.create-addservicio', compact('tipos', 'jaulas'));
    }
}
