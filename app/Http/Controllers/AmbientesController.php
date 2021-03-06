<?php

namespace App\Http\Controllers;

use App\Ambiente;
use App\Reserva;
use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AmbientesController extends Controller
{
    // MIDDLEWARE

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::get();
        $ambientes = Ambiente::get();
        return view('ambientes.mostrar')->with('ambientes', $ambientes);


        /* $ambiente = Ambiente::where('id_ambiente', 10)->first();
        return $ambiente; */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $ambiente = new Ambiente;
        $ambiente->nombre_ambiente = $request->input('nombre_ambiente');
        $ambiente->oficina_ambiente = $request->input('oficina_ambiente');
        $ambiente->capacidad_ambiente = $request->input('capacidad_ambiente');
        $ambiente->descripcion_ambiente = $request->input('descripcion_ambiente');
        if ($request->imagen !== Null) {
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $ambiente->imagen_ambiente = $imageName;
        }else {
            $ambiente->imagen_ambiente = NULL;
        }
        echo $ambiente->save();
        return redirect()->route('home');



        // echo $request->file('imagen')->store('upload');
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
        $ambiente = Ambiente::find($id);
        $ambiente->nombre_ambiente = $request->get('nombre_ambiente');
        $ambiente->oficina_ambiente = $request->get('oficina_ambiente');
        $ambiente->capacidad_ambiente = $request->get('capacidad_ambiente');
        $ambiente-> save();
        return redirect()->route('ambientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ambiente::destroy($id);
        return redirect()->route("ambientes");

    }

    public function reserva($id){
        $ambiente = Ambiente::findOrFail($id);
        $reservas = User::join('reservas', 'reservas.id', 'users.id')
                                ->where('reservas.id_ambiente',$id)
                                ->where('fecha_para_reserva', '>=', date('Y-m-d'))
                                ->get();
        return view('ambientes.reservar', compact('ambiente', 'reservas'));
    }
}
