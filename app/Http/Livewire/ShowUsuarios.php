<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ShowUsuarios extends Component
{
    public $sort = 'id';
    public $direction = 'desc';
    public $readyToLoad = false;
    protected $queryString = [
        'sort'=>['except' => 'id'],
        'direction'=>['except' => 'desc'],       
      ];
    
    public function render()
    {
        if($this->readyToLoad){
            $usuarios = User::orderBy($this->sort,$this->direction)->get();
            
        }else{
            $usuarios = [];
        }
        return view('livewire.show-usuarios',compact('usuarios'));
    }
    public function order($sort){

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
}
