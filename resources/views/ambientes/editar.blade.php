@extends('layouts.app')

@section('ambientes')
    <div class="container">
        <h1>Seccion Editar Ambientes </h1>
        Muestra los datos de los ambientes, pero no puedo actualizarlos
        La variable request no está mandando los datos al controlador
        <!-- <form method="post" action="{{ url('/ambientes/' .$ambiente->id_ambiente) }}" > -->
        
        <!-- Formulario que no funciona -->
        <!-- <form action="{{ action( 'AmbientesController@update', $ambiente->id_ambiente) }}" method="post" >
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="nombre_ambiente">Nombre del ambiente</label>
                <input type="text" class="form-control" id="nombre_ambiente" placeholder="" value="{{ $ambiente->nombre_ambiente }}">
            </div>
            <div class="form-group">
                <label for="oficina_ambiente">Oficina</label>
                <input type="text" class="form-control" id="oficina_ambiente" placeholder="" value="{{ $ambiente->oficina_ambiente }}" >
            </div>
            <div class="form-group">
                <label for="capacidad_ambiente">Capacidad</label>
                <input type="text" class="form-control" id="capacidad_ambiente" placeholder="" value="{{ $ambiente->capacidad_ambiente }}" >
            </div>
            <button type="submit" class="btn btn-primary float-right mx-1">Editar</button>
            
            <a href="{{ url('/home') }}">
                <button type="button" class="btn btn-secondary float-right mx-1">Cancelar</button>    
            </a>
        </form> -->
    </div>
@endsection
