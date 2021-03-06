<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Reserva;
use App\User;
use App\Ambiente;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReservasController extends Controller
{
    // MIDDLEWARE
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = User::join('reservas', 'reservas.id', 'users.id')
                            ->join('ambientes','ambientes.id_ambiente' , 'reservas.id_ambiente')
                            ->get();
        return view('reservas.mostrar', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservas = new Reserva;
        $user = Auth::user();
        $reservas->id = $user->id;
        $reservas->id_ambiente = $request->id_ambiente;
        $reservas->fecha_para_reserva = $request->fecha;
        $reservas->hora_desde = $request->desde;
        $reservas->hora_hasta = $request->hasta;

        $reservas->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos = Reserva::where('id_reserva', $id)->first();
        $datos->delete();
        return back();
    }

    public function check(Request $request, $id){

        $reservas = Reserva::where('id_ambiente', $id)
                                ->where('fecha_para_reserva', '>=', date('Y-m-d'))
                                ->whereDate('fecha_para_reserva', $request->fecha)
                                ->get();

        $carbonMiDesde = new Carbon($request->desde);
        $carbonMiHasta = new Carbon($request->hasta);

        if ( !sizeof($reservas) == 0) {
            foreach ($reservas as $reserva) {
                $carbonDesde = new Carbon($reserva->hora_desde);
                $carbonHasta = new Carbon($reserva->hora_hasta);

                $resultadoInicio = $carbonMiDesde->addMinute()->isBetween($carbonDesde, $carbonHasta);
                $resultadoFin = $carbonMiHasta->subMinute()->isBetween($carbonDesde, $carbonHasta);


                if ($resultadoInicio || $resultadoFin) {
                    return back()->with('mensaje', 'Los horarios seleccionados no estan disponibles')->with('alerta','alert-danger');
                }else {
                    $reservas = new Reserva;
                    $reservas->id = Auth::user()->id;
                    $reservas->id_ambiente = $request->id_ambiente;
                    $reservas->fecha_para_reserva = $request->fecha;
                    $reservas->hora_desde = $request->desde;
                    $reservas->hora_hasta = $request->hasta;

                    $reservas->save();
                    return back()->with('mensaje', 'Reserva registrada correctamente')->with('alerta','alert-success');
                }
            }
        }else {
            $reservas = new Reserva;
            $reservas->id = Auth::user()->id;
            $reservas->id_ambiente = $request->id_ambiente;
            $reservas->fecha_para_reserva = $request->fecha;
            $reservas->hora_desde = $request->desde;
            $reservas->hora_hasta = $request->hasta;

            $reservas->save();
            return back()->with('mensaje', 'Reserva registrada correctamente')->with('alerta','alert-success');
        }
    }

    public function misReservas($id_usuario){
        $reservas = User::join('reservas', 'reservas.id', 'users.id')
                            ->join('ambientes','ambientes.id_ambiente' , 'reservas.id_ambiente')
                            ->where('fecha_para_reserva', '>=', date('Y-m-d'))
                            // ->select('nombre_ambiente','fecha_para_reserva', 'hora_desde', 'hora_hasta' )
                            ->get();

        return view( 'reservas.misReservas', compact('reservas') );

    }

    public function editMiReserva($idReserva){
        $reserva = Reserva::where('id_reserva', $idReserva)->first();
        return view( 'reservas.editar', compact('reserva'));
    }

    public function updateMiReserva(Request $request, $id){
        $reservas = Reserva::where('id_ambiente', $id)
                                ->where('fecha_para_reserva', '>=', date('Y-m-d'))
                                ->whereDate('fecha_para_reserva', $request->fecha)
                                ->get();

        $carbonMiDesde = New Carbon($request->hora_desde);
        $carbonMiHasta = New Carbon($request->hora_hasta);

        if ( !sizeof($reservas) == 0) {
            foreach ($reservas as $reserva) {
                $carbonDesde = new Carbon($reserva->hora_desde);
                $carbonHasta = new Carbon($reserva->hora_hasta);

                $resultadoInicio = $carbonMiDesde->addMinute()->isBetween($carbonDesde, $carbonHasta);
                $resultadoFin = $carbonMiHasta->subMinute()->isBetween($carbonDesde, $carbonHasta);

                if ($resultadoInicio || $resultadoFin) {
                    return back()->with('mensaje', 'Los horarios seleccionados no estan disponibles')->with('alerta','alert-danger');
                }else {
                    $datosReserva = request()->except(['_token', '_method']);
                    $datosModificar = Reserva::where('id_reserva', $id)->first();
                    Reserva::where('id_reserva', $id)->update($datosReserva);
                    return back()->with('mensaje', 'Reserva cambiada correctamente')->with('alerta','alert-success');
                }
            }
        }else {
            $datosReserva = request()->except(['_token', '_method']);
            $datosModificar = Reserva::where('id_reserva', $id)->first();
            Reserva::where('id_reserva', $id)->update($datosReserva);
            return back()->with('mensaje', 'Reserva cambiada correctamente')->with('alerta','alert-success');
        }

    }

}
