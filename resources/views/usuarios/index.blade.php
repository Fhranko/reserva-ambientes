@extends('layouts.app')
@section('content')
<div class="container">

    @if(Session::has('mensaje')){{
        Session::get('mensaje')
    }}
    @endif

<table class="table table-light">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $usuario-> name }}</td>
            <td>{{ $usuario-> email }}</td>
            <td>{{ $usuario-> role }}</td>
            <td>{{ $usuario-> created_at }}</td>
            <td>{{ $usuario-> updated_at }}</td>
            <td>
                <a href="{{ url('/usuarios/' .$usuario->id. '/edit') }}">Editar</a>
            </td>
            <td>
                <form action="{{ url('/usuarios/' .$usuario->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');" >BORRAR</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
