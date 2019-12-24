@extends('layouts.app')
@section('content')
<div class="container">
    <table id="tabla-datos" class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>Ambiente</th>
                <th>Fecha</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->nombre_ambiente }}</td>
                <td>{{ $reserva->fecha_para_reserva }}</td>
                <td>{{ date("h:i", strtotime( $reserva->hora_desde )) }}</td>
                <td>{{ date("h:i", strtotime( $reserva->hora_hasta )) }}</td>
                <td>
                    <a class="btn btn-secondary" href=" {{ route('reservas.editMiReserva', $reserva->id_reserva)}} ">Editar</a>
                </td>
                <td>
                    <button class="btn btn-danger" >Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
