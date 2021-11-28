<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUsuarios extends Component
{
  use WithPagination;
  public $sort = 'id';
  public $direction = 'desc';
  public $readyToLoad = false;
  public $rol;
  public $search = '';
  public $cant = '5';
  protected $listeners = ['render' => 'render','delete'];
  protected $queryString = [
    'cant' => ['except' => '5'],
    'sort' => ['except' => 'id'],
    'direction' => ['except' => 'desc'],
    'search' => ['except' => '']
  ];
  public function updatingSearch()
  {
    $this->resetPage();
  }
  public function mount($rol)
  {
    $this->rol = $rol;
  }
  public function render()
  {
    if ($this->readyToLoad) {
      if ($this->rol == 'null') {
        $usuarios = User::where('name', 'ILIKE', '%' . $this->search . '%')
          ->orWhere('email', 'ILIKE', '%' . $this->search . '%')
          ->orderBy($this->sort, $this->direction)
          ->paginate($this->cant);
      } else {
        $usuarios = User::where('name', 'ILIKE', '%' . $this->search . '%')
          ->orWhere('email', 'ILIKE', '%' . $this->search . '%')
          ->role($this->rol)
          ->orderBy($this->sort, $this->direction)
          ->paginate($this->cant);
      }
    } else {
      $usuarios = [];
    }
    return view('livewire.show-usuarios', compact('usuarios'));
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
  public function loadPage()
  {
    $this->readyToLoad = true;
  }
  public function delete(User $usuario)
  {
    $usuario->delete();
  }
}
