@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Desde</th>
                <th>Hasta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $reserva->hora_desde }} </td>
                    <td> {{ $reserva->hora_hasta }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
