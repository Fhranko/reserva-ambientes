<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ '/css/app.css' }}">
    <title>Document</title>
</head>
<body>

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="container contenedor-login w-25">
  <form class="d-flex align-items-center justify-content-center flex-column h-100">
    <div class="form-group">
      <label for="formGroupExampleInput">Usuario</label>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">Contraseña</label>
      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
    </div>
      <div class="m-1 btn btn-primary">Registrarse</div>
      <div class="m-1 btn btn-secondary">Iniciar seccion</div>
  </form>
</div>
</body>
</html>