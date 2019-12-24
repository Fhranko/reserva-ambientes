@extends('layouts.app')
@section('content')
<div class="container">
        <form action="{{ route('reservas.updateMiReserva', $reserva->id_reserva) }}" method="post">
                @csrf
                <h2 class="text-center">Reservar en ambiente</h2>
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group w-25 p-1">
                        <label for="desde">Desde: </label>
                        <input name="desde" type="time" class="form-control" id="desde" min="09:00" max="19:00" step="600" value="{{$reserva->hora_desde}}" required >
                    </div>
                    <div class="form-group w-25 p-1">
                        <label for="hasta">Hasta: </label>
                        <input name="hasta" type="time" class="form-control" id="hasta" min="09:00" max="19:00" step="600" value="{{$reserva->hora_hasta}}" required >
                    </div>
                </div>
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group w-50">
                        <label for="fecha">Fecha</label>
                        <input name="fecha" type="date" class="form-control" id="fecha" placeholder="" value="{{ $reserva->fecha_para_reserva }}" required >
                    </div>
                </div>
                <input name="id_ambiente" type="text" class="d-none" value="{{ $reserva->id_ambiente }}" >
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block w-50">Reservar Ambiente</button>
                </div>
            </form>
            @if(Session::has('mensaje')){{
                Session::get('mensaje')
            }}
            @endif
</div>
@endsection
