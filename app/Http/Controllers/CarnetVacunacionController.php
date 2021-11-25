<?php

namespace App\Http\Controllers;

use App\Models\Carnet;
use Illuminate\Http\Request;

class CarnetVacunacionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CarnetVacunacion = Carnet::all();
        //dd($CarnetVacunacion); 
        return view('CarnetVacunacion.index', [ 'CVacunacion' => $CarnetVacunacion ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CarnetVacunacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $CarnetVacunacion = new Carnet($request->all());
        $CarnetVacunacion->save();
        return redirect()->route('CarnetVacunacion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $CarnetVacunacion = Carnet::find($id); 
          
        return view('CarnetVacunacion.show', [ 'CV' => $CarnetVacunacion ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $CarnetVacunacion = Carnet::find($id);
        return view('CarnetVacunacion.edit', [ 'CV' => $CarnetVacunacion ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $CarnetVacunacion = Carnet::find($id);
        $CarnetVacunacion->descripcion = $request->input('descripcion');
        $CarnetVacunacion->fecha_vacuna = $request->input('fecha_vacunacion');
        $CarnetVacunacion->fecha_proxima = $request->input('fecha_proxima');
        $CarnetVacunacion->save();        
        return redirect()->route('CarnetVacunacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
