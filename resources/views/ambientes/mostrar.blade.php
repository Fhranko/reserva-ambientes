@extends('layouts.app')

@section('ambientes')
<div class="container">
    <div class="row">
        @foreach ($ambientes as $ambiente)
            <div class="col-sm-4 mt-3">
                <div class="card">
                <img class="card-img-top" src="{{ asset('/images/default-image.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{ $ambiente->nombre_ambiente }}</h4>
                        <p class="card-text">
                            {{ $ambiente->descripcion_ambiente}}
                        </p>
                        @if ( Auth::user()->role == 'administrador' )
                            <a href=" {{ '/ambientes/'. $ambiente->id_ambiente . '/editar'}} " class="btn btn-secondary" > Editar </a>
                        @endif
                        <a href="{{ '/ambientes/reserva/'. $ambiente->id_ambiente }}" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
