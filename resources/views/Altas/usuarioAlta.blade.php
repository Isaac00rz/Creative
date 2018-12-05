@include('Menus.admin')
<link href="{{ asset('css/usuario.css') }}" rel="stylesheet">

<title>Alta Usuario</title>
<section class="contenido">
    <div id="contenedor">
<div id="cabecera">Registro</div>
<br>
<form role="form" name="form" method="post" action="{{ url('/Altas/Usuarios/altaUsuario') }}">
{!! csrf_field() !!}
 @csrf

<div class="renglon">
    <label for="name" class="etiqueta"><b>Nombre</b></label>
    <div class="input">
        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" maxlength="15" required autofocus placeholder="nombre">
    </div>
</div>

<div class="renglon">
    <label for="username" class="etiqueta"><b>Nombre de usuario</b></label>

    <div class="input">
        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required maxlength="15" placeholder="nombre de usuario">

        @if ($errors->has('username'))
        <br>
                <strong style="Color:red">El nombre de usuario ya fue registrado, ingrese uno diferente</strong>
        @endif
    </div>
</div>

<div class="renglon">
<label for="rol" class="etiqueta"><b>Rol de usuario</b></label>
<select name="rol">
    <option name="Usuario" selected>Usuario</option>
    <option name="Administrador" >Administrador</option>
</select>
</div>

<div class="renglon">
    <label for="email" class="etiqueta"><b>Correo electrónico</b></label>

    <div class="input">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" maxlength="40" required placeholder="correo electrónico">

        @if ($errors->has('email'))
        <br>
        <strong style="Color:red">El correo ya fue registrado, ingrese uno diferente</strong>
        @endif
    </div>
</div>

<div class="renglon">
    <label for="password" class="etiqueta"><b>Contraseña</b></label>

    <div class="input">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="contraseña">

        @if ($errors->has('password'))
        <br>
        <strong style="Color:red">La confirmación de contraseña debe coincidir con la contraseña y debe contener al menos 6 carácteres</strong>
        @endif
    </div>
</div>

<div class="renglon">
     <label for="password-confirm" class="etiqueta"><b>Confirmar contraseña</b></label>

    <div class="input">
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="confirmar contraseña">
    </div>
</div>
<br>
<button type="submit">Registrar</button>
    </form>
</div>
</section>
