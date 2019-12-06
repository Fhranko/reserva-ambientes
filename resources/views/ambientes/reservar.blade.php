@extends('layouts.app')
@section('content')
<div class="container">
{{-- Card para mostrar datos del ambiente --}}
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="https://picsum.photos/200" class="card-img" alt="imagen del ambiente a reservar">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nombre del ambiente: {{ $ambiente->nombre_ambiente }}</h5>
                    <p class="card-text">Descripción del ambiente: {{ $ambiente->descripción_ambiente }}</p>
                    <p class="card-text"><small class="text-muted">Capacidad del ambiente: {{ $ambiente->capacidad_ambiente }} personas.  </small></p>
                    <h5>Reservas actuales: </h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>id ambiente</th>
                                <th>Reservado por</th>
                                <th>Fecha de la reserva</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $reserva)
                                {{-- @if ( $reserva->id_ambiente = $id ) --}}
                                    <tr>
                                        <td>{{ $reserva->id_ambiente }}</td>
                                        <td>{{ $reserva->name }}</td>
                                        <td>{{ $reserva->fecha_para_reserva }}</td>
                                        <td>{{ date('HH:MM', ($reserva->hora_desde)->time_start)}}</td>
                                        <td>{{ $reserva->hora_hasta}}</td>
                                    </tr>
                                {{-- @endif --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Verificar la disponobilidad del ambiente --}}
    <form action="{{ action('ReservasController@store') }}" method="POST" >
        @csrf
        <h2 class="text-center">Reservar en ambiente</h2>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="desde">Desde: </label>
                <input name="desde" type="time" class="form-control" id="hasta" min="09:00" max="19:00" step="600">
            </div>
            <div class="form-group col-md-6">
                <label for="hasta">Hasta: </label>
                <input name="hasta" type="time" class="form-control" id="hasta" step="600">
            </div>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input name="fecha" type="date" class="form-control" id="fecha" placeholder="">
        </div>
        <input name="id_ambiente" type="text" class="d-none" value="{{ $ambiente->id_ambiente }}" >
        {{-- <button type="submit" class="btn btn-primary btn-block">Verificar Disponibilidad</button> --}}
        <button type="submit" class="btn btn-primary btn-block">Reservar Directamente</button>
    </form>
    {{-- Reservar el ambiente --}}

</div>
@endsection
