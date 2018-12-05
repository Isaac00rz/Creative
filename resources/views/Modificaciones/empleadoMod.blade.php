@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Editar Empleado</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/editarEmpleado') }}">
{{csrf_field()}}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td>ID empleado</td>
                <td>Nombre</td>
                <td>Primer Apellido</td>
                <td>Segundo Apellido</td>
                <td>Dirección</td>
                <td>Colonia</td>
                <td>Código Postal</td>
                <td>Celular</td>
                <td>Teléfono Fijo</td>
                <td>E-mail</td>
            </tr>
            @foreach ($Empleado as $c)
            <tr>
                <td><input type="number" name="id_empleado" value = "{{$c->id_empleado}}"  disabled></td>
                <td><input type="text" name="nombre" maxlength = "20" placeholder="nombre" value = "{{$c->nombre}}" required></td>
                <td><input type="text" name="apellidoP" maxlength="20" placeholder="primer apellido" value = "{{$c->apellidoP}}" required></td>
                <td><input type="text" name="apellidoM" maxlength="20" placeholder="segundo apellido" value = "{{$c->apellidoM}}" required></td>
                <td><input type="text" name="direccion" placeholder="dirección" value = "{{$c->direccion}}" required></td>
                <td><input type="text"name="colonia" placeholder="colonia" value = "{{$c->colonia}}" required></td>
                <td><input type="number" name="CP" min="1" placeholder="CP" value = "{{$c->CP}}" required></td>
                <td><input type="text"name="Telefono" placeholder="4774567890" pattern="[0-9]{10}" value = "{{$c->Telefono}}" required></td>
                <td><input type="text" name="TelefonoFijo" placeholder="4774567890" pattern="[0-9]{10}" value = "{{$c->TelefonoFijo}}" required></td>
                <td><input type="email" name="correo" maxlength = "40" placeholder="e-mail" value = "{{$c->correo}}" required></td>
                <td><input type="hidden" name="id_empleadoV"  value = "{{$c->id_empleado}}"></td>
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Actualizar registro</b></button>
    </form>
</section>
</body>
</html>