@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje')){{
        Session::get('mensaje')
    }}
    @endif
    <div class="custom-table">
        <table id="tabla-datos" class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>

            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>{{ $usuario->created_at }}</td>
                    <td>{{ $usuario->updated_at }}</td>
                    <td>
                        <a class="btn btn-secondary"  href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post">
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
</div>

@endsection
