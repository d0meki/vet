<?php

namespace App\Http\Livewire;

use App\Models\Tipos;
use Livewire\Component;
use Livewire\WithFileUploads;

class IndexServicio extends Component
{
    use WithFileUploads;

    // use WithPagination;
    public $servicios, $nombre, $descripcion, $costo, $imagenurl, $status, $servicio_id;
    public $search, $sort = "id", $direction = "asc";
    public $isModal = false;
    public function render()
    {
        $this->servicios = Tipos::where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('descripcion', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->get();
        // $this->servicios = Servicio::orderBy('id', 'asc')->get();
        // $this->servicios = collect($tmp_servicios);
        return view('livewire.index-servicio');
    }
    public function orderByProp($prop = null)
    {
        if ($this->sort == $prop) {
            if ($this->direction == 'asc') {
                $this->direction = 'desc';
            } else {
                $this->direction = 'asc';
            }
        } else {
            $this->sort = $prop;
            $this->direction = 'asc';
        }
    }

    public function create()
    {
        $this->openModal();
        $this->resetForm();
    }
    public function openModal()
    {
        $this->isModal = true;
    }
    public function closeModal()
    {
        $this->isModal = false;
    }
    public function resetForm()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->costo = '';
        $this->imagenurl = '';
        $this->status = false;
    }

    public function store()
    {
        // $imagen = $this->imagenurl->store('servicios');
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'costo' => 'required',
            'imagenurl' => 'required',
            'status' => 'required',
        ]);
        Tipos::updateOrCreate(['id' => $this->servicio_id], [
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'costo' => $this->costo,
            'imagenurl' => $this->imagenurl,
            'status' => $this->status,
        ]);
        $this->closeModal();
        $this->resetForm();
    }

    public function edit($id)
    {
        $servicio = Tipos::findOrFail($id);
        $this->servicio_id = $id;
        $this->nombre = $servicio->nombre;
        $this->descripcion = $servicio->descripcion;
        $this->costo = $servicio->costo;
        $this->imagenurl = $servicio->imagenurl;
        $this->status = $servicio->status;

        $this->openModal();
    }

    public function delete($id)
    {
        Tipos::find($id)->delete();
    }
}
