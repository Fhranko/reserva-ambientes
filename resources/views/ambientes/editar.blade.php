@extends('layouts.app')

@section('ambientes')
    <div class="container">
        <h1>Editar datos del ambiente </h1>
        <form action="{{ action( 'AmbientesController@update', $ambiente->id_ambiente) }}" method="post" >
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="nombre_ambiente">Nombre del ambiente</label>
                <input type="text" name="nombre_ambiente" class="form-control" id="nombre_ambiente" placeholder="" value="{{ $ambiente->nombre_ambiente }}">
            </div>
            <div class="form-group">
                <label for="oficina_ambiente">Oficina</label>
                <input type="text" name="oficina_ambiente" class="form-control" id="oficina_ambiente" placeholder="" value="{{ $ambiente->oficina_ambiente }}" >
            </div>
            <div class="form-group">
                <label for="capacidad_ambiente">Capacidad</label>
                <input type="text" name="capacidad_ambiente" class="form-control" id="capacidad_ambiente" placeholder="" value="{{ $ambiente->capacidad_ambiente }}" >
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción del ambiente</label>
            <textarea class="form-control" name="descripcion_ambiente" id="descripcion" rows="10" cols="50">{{ $ambiente->descripcion_ambiente }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right mx-1">Editar</button>
            <a href="{{ url('/home') }}">
                <button type="button" class="btn btn-secondary float-right mx-1">Cancelar</button>
            </a>
        </form>
        <form action="{{ url('/ambientes/' .$ambiente->id_ambiente) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" >Borrar</button>
        </form>

    </div>
@endsection
