<?php

namespace App\Http\Controllers;

use App\Helpers\BitacoraHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
class BackupController extends Controller
{
    public function store(Request $request)
    {   
        
        
       /*  echo "\nEste script se ejecuta en: " . __DIR__; */
     
        $rutapadre = dirname(__DIR__);
        
        $rutapadre = $rutapadre.'\\';
        $fecha=date("Y-m-d h:i:s a', time()");
        $fecha = preg_replace('([^A-Za-z0-9 -])', '', $fecha);
        /*$fecha=date('m-d-Y h:i:s a', time());*/
        $rutadearchivo = $rutapadre.$fecha.".txt";
       /*  echo "\nLa hora y fecha es: $rutadearchivo"; */
      // dd($rutadearchivo);
        system("pg_dump  -U Freddy -d jetstream -h localhost -f \"$rutapadre$fecha.txt\"");

    
        //guardar archivo
        header("Content-disposition: attachment;filename=$fecha.txt");
        header("Content-type: MIME");
        readfile("$rutadearchivo");

        BitacoraHelper::insertBitacora('El usuario '.Auth::user()->name.' realizo un backup');
        
    }
}
