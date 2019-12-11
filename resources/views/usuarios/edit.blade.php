@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label for="name">Nombre</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ $usuario->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="text" name="email" value="{{ $usuario->email }}" >
        </div>
        <div class="form-check form-check-inline d-flex justify-content-center">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" id="usuario" value="usuario" @if ($usuario->role == 'usuario') checked @endif >
                <label class="form-check-label" for="usuario">
                    Usuario
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="role" id="administrador" value="administrador" @if ($usuario->role == 'administrador') checked @endif>
                <label class="form-check-label" for="administrador">
                    Administrador
                </label>
            </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Modificar</button>
    </form>
</div>
@endsection
