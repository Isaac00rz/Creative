@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Alta Proveedor</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/editarProvedor') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td>ID provedor</td>
                <td>Nombre</td>
                <td>Dirección</td>
                <td>Colonia</td>
                <td>Código Postal</td>
                <td>Celular</td>
                <td>Teléfono Fijo</td>
                <td>E-mail</td>
                <td>Descripción</td>
            </tr>
            @foreach ($provedor as $c)
            <tr>
                <td><input type="number" name="id_provedor" value = "{{$c->id_provedor}}"  disabled></td>
                <td><input type="text" name="nombre" maxlength = "20" placeholder="nombre" value = "{{$c->nombre}}" required></td>
                <td><input type="text" name="direccion" maxlength="30" placeholder="dirección" value = "{{$c->direccion}}" required></td>
                <td><input type="text" name="colonia" maxlength="25" placeholder="colonia" value = "{{$c->colonia}}" required></td>
                <td><input type="number" name="CP" min="1" placeholder="CP" value = "{{$c->cp}}" required></td>
                <td><input type="tel"name="celular" placeholder="4774567890" pattern="[0-9]{10}" value = "{{$c->telefonoPersonal}}" required></td>
                <td><input type="tel" name="telFijo" placeholder="4774567890" pattern="[0-9]{10}" value = "{{$c->telefonoFijo}}" required></td>
                <td><input type="email" name="correo" maxlength = "35" placeholder="e-mail" value = "{{$c->correo}}" required></td>
                <td><input type="text" name="descripcion" maxlength = "250" placeholder="descripción" value = "{{$c->descripcion}}"></td>
                <td><input type="hidden" name="id_provedorV"  value = "{{$c->id_provedor}}"></td>
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Actualizar registros</b></button>
    </form>
    
</section>
</body>
</html>