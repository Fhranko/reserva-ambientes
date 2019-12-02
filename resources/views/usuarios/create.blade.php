<form action="{{ url('/usuarios') }}" method="post">
    {{ csrf_field() }}
    <label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="">

    <label for="ApPaterno">{{'Apellido Paterno'}}</label>
    <input type="text" name="ApPaterno" id="ApPaterno" value="">

    <label for="ApMaterno">{{'Apellido Materno'}}</label>
    <input type="text" name="ApMaterno" id="ApMaterno" value="">

    <label for="Correo">{{'Correo'}}</label>
    <input type="text" name="Correo" id="Correo" value="">

    <input type="submit" value="Agregar">
</form>
