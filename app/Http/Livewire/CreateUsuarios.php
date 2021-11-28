<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUsuarios extends Component
{
    public $open = false;
    public $name,$phone,$address,$email,$password;
    public $rol='';
    protected $queryString = [
        'rol' => ['except' => 'empleado'],
    ];
    protected $rules = [
       'name' => 'required',
       'phone' => 'required',
       'address' => 'required',
       'email' => 'required | email',
       'password' => 'required',
    ];
    public function save(){

        $this->validate();
        User::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'password' =>  Hash::make($this->password),
        ])->assignRole($this->rol);
        $this->reset(['open','name','phone','address','email','password']);
        $this->emitTo('show-usuarios','render');
        $this->emit('alert','El post se creo satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.create-usuarios');
    }
}
