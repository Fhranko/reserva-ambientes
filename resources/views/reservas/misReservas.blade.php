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
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td>{{ $reserva->nombre_ambiente }}</td>
                <td>{{ $reserva->fecha_para_reserva }}</td>
                <td>{{ date("h:i", strtotime( $reserva->hora_desde )) }}</td>
                <td>{{ date("h:i", strtotime( $reserva->hora_hasta )) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
