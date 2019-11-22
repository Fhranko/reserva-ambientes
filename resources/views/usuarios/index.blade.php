Inicio (Despliegue de datos)

<table class="table table-light">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Ap. Paterno</th>
            <th>Ap. Materno</th>
            <th>Correo</th>
        </tr>
    </thead>
    
    <tbody>
    @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $usuario-> nombre }}</td>
            <td>{{ $usuario-> ApPaterno }}</td>
            <td>{{ $usuario-> ApMaterno }}</td>
            <td>{{ $usuario-> correo }}</td>
            <td>Editar | 
                
                <form action="{{ url('/usuarios/' .$usuario->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return confirm('¿Borrar?');" >Borrar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>