<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Reportes extends Component
{
    public function render()
    {
        $registros=DB::table('servicios')
        ->select('servicios.*')
        ->get();
        return view('livewire.reportes', [ 'reg' => $registros ]);
    }
}
