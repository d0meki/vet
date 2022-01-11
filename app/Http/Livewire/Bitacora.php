<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Bitacora extends Component
{

    public function render()
    {
        $registros=DB::table('bitacoras')
        ->select('bitacoras.*')
        ->get();
       
        return view('livewire.bitacora', [ 'reg' => $registros ]);
    
    }
}
