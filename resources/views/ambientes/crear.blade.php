@extends('layouts.app')
@section('ambientes')
<div class="container">
    <h1>Seccion Crear Ambientes</h1>
    <form action="{{ route('ambientes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre ambiente</label>
            <input type="text" name="nombre_ambiente" class="form-control" id="nombre" placeholder="">
        </div>
        <div class="form-group">
            <label for="oficina">Oficina</label>
            <input type="text" name="oficina_ambiente" class="form-control" id="oficina" placeholder="">
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="text" name="capacidad_ambiente" class="form-control" id="capacidad" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary float-right mx-1">Crear</button>
        <a href="{{ url('/home') }}">
            <button type="button" class="btn btn-secondary float-right mx-1">Cancelar</button>
        </a>
    </form>
</div>
@endsection
