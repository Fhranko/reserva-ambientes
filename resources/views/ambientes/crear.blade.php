@extends('layouts.app')
@section('ambientes')
<div class="container">
    <h1>Registrar un nuevo ambiente</h1>
    <form action="{{ route('ambientes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre ambiente</label>
            <input type="text" name="nombre_ambiente" class="form-control" id="nombre" placeholder="" autofocus>
        </div>
        <div class="form-group">
            <label for="oficina">Oficina</label>
            <input type="text" name="oficina_ambiente" class="form-control" id="oficina" placeholder="">
        </div>
        <div class="form-group">
            <label for="capacidad">Capacidad</label>
            <input type="number" name="capacidad_ambiente" class="form-control" id="capacidad" placeholder="">
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción del ambiente</label>
            <textarea class="form-control" name="descripcion_ambiente" id="descripcion" rows="10" cols="50" placeholder="Escribe una breve descripción del uso del ambiente."></textarea>
        </div>
        <div class="form-group">
            <label for="imagen">Suba una imagen para el ambiente</label>
            <input type="file" name="imagen" class="form-control" id="imagen" placeholder="">
        </div>
        <button type="submit" class="btn btn-primary float-right mx-1">Crear</button>
        <a href="{{ url('/home') }}">
            <button type="button" class="btn btn-secondary float-right mx-1">Cancelar</button>
        </a>
    </form>
</div>
@endsection
