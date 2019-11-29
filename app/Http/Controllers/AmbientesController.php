<?php

namespace App\Http\Controllers;

use App\Ambiente;

use Illuminate\Http\Request;

class AmbientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ambientes = Ambiente::get();
        return view('ambientes.mostrar')->with('ambientes', $ambientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ambientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ambiente= Ambiente::findOrFail($id);
        return view('ambientes.editar', compact('ambiente'));
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
        // $datosAmbiente = request()->except(['_token', '_method']);
        // $ambiente=Ambiente::find($id);
        // return $request;
        // Ambiente::where('id_ambiente', $id)->update($datosAmbiente);
        
        return $request;



        // $ambiente = Ambiente::find($id);
        // $ambiente->nombre_ambiente = $request->get('nombre_ambiente');
        // $ambiente->oficina_ambiente = $request->get('oficina_ambiente');
        // $ambiente->capacidad_ambiente = $request->get('capacidad_ambiente');
        // $ambiente->save();
        
        // return view('ambientes.editar', compact('ambiente'));
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
