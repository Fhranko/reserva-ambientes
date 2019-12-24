@extends('layouts.app')
@section('content')

<div class="container">
{{-- Card para mostrar datos del ambiente --}}
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('/images/default-image.jpg') }}" class="card-img" alt="imagen del ambiente a reservar">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nombre del ambiente: {{ $ambiente->nombre_ambiente }}</h5>
                    <p class="card-text">Descripción del ambiente: {{ $ambiente->descripcion_ambiente }}</p>
                    <p class="card-text"><small class="text-muted">Capacidad del ambiente: {{ $ambiente->capacidad_ambiente }} personas. </small></p>
                    <h5>Reservas actuales: </h5>
                    @if (!sizeof($reservas) == 0)
                        <table id="tabla-datos" class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Reservado por</th>
                                    <th>Fecha de la reserva</th>
                                    <th>Desde</th>
                                    <th>Hasta</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservas as $reserva)
                                    <tr>
                                        <td>{{ $reserva->name }}</td>
                                        <td>{{ $reserva->fecha_para_reserva }}</td>
                                        <td>{{ date("h:i", strtotime( $reserva->hora_desde )) }}</td>
                                        <td>{{ date("h:i", strtotime( $reserva->hora_hasta )) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h2 class=" alert alert-info text-center" >No hay reservas aún. ¡Tienes todos los horarios disponibles!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('reservas.check', $ambiente->id_ambiente) }}" method="post">
        @csrf
        <h2 class="text-center">Reservar en ambiente</h2>
        <div class="form-row d-flex justify-content-center">
            <div class="form-group w-25 p-1">
                <label for="desde">Desde: </label>
                <input name="desde" type="time" class="form-control" id="desde" min="09:00" max="19:00" step="600" required >
            </div>
            <div class="form-group w-25 p-1">
                <label for="hasta">Hasta: </label>
                <input name="hasta" type="time" class="form-control" id="hasta" min="09:00" max="19:00" step="600" required >
            </div>
        </div>
        <div class="form-row d-flex justify-content-center">
            <div class="form-group w-50">
                <label for="fecha">Fecha</label>
                <input name="fecha" type="date" class="form-control" id="fecha" placeholder="" required >
            </div>
        </div>
        <input name="id_ambiente" type="text" class="d-none" value="{{ $ambiente->id_ambiente }}" >
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary btn-block w-50">Reservar Ambiente</button>
        </div>
    </form>
    <h1>
        @if(Session::has('mensaje')){{
            Session::get('mensaje')
        }}
        @endif
    </h1>
</div>
@endsection
