<?php

namespace App\Http\Livewire;

use App\Models\Jaula as ModelsJaula;
use App\Models\Mascota;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Jaula extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $janimal, $image, $identificador;
    public $search = ' ';
    public $sort = 'id';
    public $direction = 'desc';
    public $cant = '5';
    public $readyToLoad = false;

    public $open_edit = false;
    protected $listeners = ['render', 'delete'];

    protected $queryString = [
        'cant' => ['except' => '5'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];


    public function mount()
    {
        $this->identificador = rand();
        $this->janimal = new ModelsJaula();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    protected $rules = [
        'janimal.nombre' => 'required',
        'janimal.descripcion' => 'required',
    ];
    public function render()
    {
        if ($this->readyToLoad) {
            $janimals = ModelsJaula::where('nombre', 'like', '%' . $this->search . '%')
                ->orwhere('descripcion', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $janimals = [];
        }
        return view('livewire.jaula', compact('janimals'));
    }
    public function loadJaula()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(ModelsJaula $janimal)
    {
        $this->janimal = $janimal;
        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->image) {
            Storage::delete([$this->janimal->image]);

            $this->janimal->image = $this->image->store('imagenes');
        }

        $this->janimal->save();

        $this->reset(['open_edit', 'image']);
        $this->identificador = rand();

        $this->emitTo('jaula', 'render');

        $this->emit('alert', 'la jaula se actualizo exitosamente');
    }
    public function delete(ModelsJaula $janimal){
        Storage::delete([$janimal->image]);
        $janimal ->delete(); 
    }
}
