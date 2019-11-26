<form action="{{ url('/usuarios/'.$usuario->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value={{ $usuario->nombre }}>
    
    <label for="ApPaterno">{{'Apellido Paterno'}}</label>
    <input type="text" name="ApPaterno" id="ApPaterno" value= {{ $usuario->ApPaterno }} >
    
    <label for="ApMaterno">{{'Apellido Materno'}}</label>
    <input type="text" name="ApMaterno" id="ApMaterno" value= {{ $usuario->ApMaterno }} >

    <label for="Correo">{{'Correo'}}</label>
    <input type="text" name="Correo" id="Correo" value= {{ $usuario->correo }} >
    
    {{ method_field('PATCH') }}
    <input type="submit" value="Modificar">
</form>