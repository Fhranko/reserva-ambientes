@extends('layouts.app')
@section('ambientes')
<h1>Seccion Crear Ambientes</h1>
<form>
    <div class="form-group">
        <label for="nombre">Nombre ambiente</label>
        <input type="text" class="form-control" id="nombre" placeholder="Example input">
    </div>
    <div class="form-group">
        <label for="oficina">Oficina</label>
        <input type="text" class="form-control" id="oficina" placeholder="Another input">
    </div>
    <div class="form-group">
        <label for="capacidad">Capacidad</label>
        <input type="text" class="form-control" id="capacidad" placeholder="Another input">
    </div>
</form>
@endsection