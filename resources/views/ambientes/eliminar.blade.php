@extends('layouts.app')

@section('ambientes')
<div class="container">
    <h2>Seccion Eliminar Ambientes</h2>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Oficina</th>
                <th>Capacidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ambientes as $ambiente)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ambiente->nombre_ambiente }}</td>
                <td>{{ $ambiente->oficina_ambiente }}</td>
                <td>{{ $ambiente->capacidad_ambiente }}</td>
                <td class="d-flex justify-content-around    ">
                    <a href="{{ url('/ambientes/' .$ambiente->id_ambiente. '/editar') }}">
                        Editar
                    </a>

                    <form action="{{ url('/ambientes/' .$ambiente->id_ambiente) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" >Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
