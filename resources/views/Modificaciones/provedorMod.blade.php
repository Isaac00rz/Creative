@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Alta Proveedor</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/editarProvedor') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Nombre</td>
                <td class="tds">Primer Apellido</td>
                <td class="tds">Segundo Apellido</td>
                <td class="tds">Dirección</td>
                <td class="tds">Colonia</td>
                <td class="tds">Código Postal</td>
                <td class="tds">Celular</td>
                <td class="tds">Teléfono Fijo</td>
                <td class="tds">E-mail</td>
                <td class="tds">Descripción</td>
                <td class="tds">Eliminar</td>
            </tr>
            @foreach ($provedor as $c)
            <tr>
                <td class="tds"><input class="inputs" type="disable" name="id_provedor" value = "{{$c->id_provedor}}"></td>
                <td class="tds"><input class="inputs" type="text" name="nombre" maxlength = "20" placeholder="nombre" value = "{{$c->nombre}}" required></td>
                <td class="tds"><input class="inputs" type="text" name="pApellido" maxlength = "20" placeholder="primer apellido" value = "{{$c->apellidoP}}" required></td>
                <td class="tds"><input class="inputs" type="text"name="sApellido" maxlength = "20" placeholder="segundo apellido" value = "{{$c->apellidoM}}" required></td>
                <td class="tds"><input class="inputs" type="text" name="direccion" maxlength="30" placeholder="dirección" value = "{{$c->direccion}}" required></td>
                <td class="tds"><input class="inputs" type="text" name="colonia" maxlength="25" placeholder="colonia" value = "{{$c->colonia}}" required></td>
                <td class="tds"><input class="inputs" type="number" name="CP" min="1" placeholder="CP" value = "{{$c->cp}}" required></td>
                <td class="tds"><input class="inputs" type="tel"name="celular" placeholder="4774567890" pattern="[0-9]{10}" value = "{{$c->telefonoPersonal}}" required></td>
                <td class="tds"><input class="inputs" type="tel" name="telFijo" placeholder="4774567890" pattern="[0-9]{10}" value = "{{$c->telefonoFijo}}" required></td>
                <td class="tds"><input class="inputs" type="email" name="correo" maxlength = "35" placeholder="e-mail" value = "{{$c->correo}}" required></td>
                <td class="tds"><input class="inputs" type="text" name="descripcion" maxlength = "250" placeholder="descripción" value = "{{$c->descripcion}}"></td>
                <td class="tds"><input class="inputs" type="hidden" name="id_provedorV"  value = "{{$c->id_provedor}}"></td>
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Insertar registros</b></button>
    </form>
    
</section>
</body>
</html>