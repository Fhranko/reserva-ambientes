@extends('layouts.app')

@section('ambientes')
<div class="container">
    <div class="row">
        @foreach ($ambientes as $ambiente)
            <div class="col-sm-4 mt-3">
                <div class="card">
                @if ($ambiente->imagen_ambiente !== NULL)
                    <img class="card-img-top" src="/images/{{$ambiente->imagen_ambiente}}" alt="Card image cap">
                @else
                    <img class="card-img-top" src="{{ asset('/images/default-image.jpg') }}" alt="Card image cap">
                @endif
                    <div class="card-body">
                        <h4 class="card-title">{{ $ambiente->nombre_ambiente }}</h4>
                        <p class="card-text">
                            {{ $ambiente->descripcion_ambiente}}
                        </p>
                        @if ( Auth::user()->role == 'administrador' )
                            <a href=" {{ route('ambientes.edit', $ambiente->id_ambiente) }} " class="btn btn-secondary" > Editar </a>
                        @endif
                        <a href="{{ route('ambientes.reserva', $ambiente->id_ambiente) }}" class="btn btn-primary">Reservar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
