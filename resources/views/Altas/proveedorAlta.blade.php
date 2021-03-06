@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Alta Proveedor</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/Altas/Proveedores/altaProveedor') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Nombre</td>
                <td class="tds">Dirección</td>
                <td class="tds">Colonia</td>
                <td class="tds">Código Postal</td>
                <td class="tds">Celular</td>
                <td class="tds">Teléfono Fijo</td>
                <td class="tds">E-mail</td>
                <td class="tds">Descripción</td>
                <td class="tds">Eliminar</td>
            </tr>
            <tr>
                <td class="tds"><input class="inputs" type="text" name="nombre[]" maxlength = "20" placeholder="nombre" required></td>
                <td class="tds"><input class="inputs" type="text" name="direccion[]" maxlength="30" placeholder="dirección" required></td>
                <td class="tds"><input class="inputs" type="text" name="colonia[]" maxlength="25" placeholder="colonia" required></td>
                <td class="tds"><input class="inputs" type="number" name="CP[]" min="1" placeholder="CP" required></td>
                <td class="tds"><input class="inputs" type="tel"name="celular[]" placeholder="4774567890" pattern="[0-9]{10}" required></td>
                <td class="tds"><input class="inputs" type="tel" name="telFijo[]" placeholder="4774567890" pattern="[0-9]{10}" required></td>
                <td class="tds"><input class="inputs" type="email" name="correo[]" maxlength = "35" placeholder="e-mail" required></td>
                <td class="tds"><input class="inputs" type="text" name="descripcion[]" maxlength = "250" placeholder="descripción"></td>
                <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
            </tr>

        </table>
        <button id="add" type="button" ><b>Añadir registro</b></button>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Insertar registros</b></button>
    </form>
    
</section>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/tablaProveedor.js') }}"></script>
</body>
</html>