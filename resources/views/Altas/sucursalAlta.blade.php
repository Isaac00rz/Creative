@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Alta Sucursal</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/Altas/Sucursal/altaSucursal') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Nombre</td>
                <td class="tds">Dirección</td>
                <td class="tds">Colonia</td>
                <td class="tds">Código Postal</td>
                <td class="tds">Teléfono</td>
                <td class="tds">E-mail</td>
                <td class="tds">Eliminar</td>
            </tr>
            <tr>
                <td class="tds"><input class="inputs" type="text" name="Nombre[]" maxlength = "20" placeholder="nombre" required></td>
                <td class="tds"><input class="inputs" type="text" name="Direccion[]" maxlength="30" placeholder="dirección" required></td>
                <td class="tds"><input class="inputs" type="text" name="Colonia[]" maxlength="25" placeholder="colonia" required></td>
                <td class="tds"><input class="inputs" type="number" name="CP[]" min="1" placeholder="CP" required></td>
                
                <td class="tds"><input class="inputs" type="tel" name="Telefono[]" placeholder="4774567890" pattern="[0-9]{10}" required></td>
                <td class="tds"><input class="inputs" type="email" name="Correo[]" maxlength = "35" placeholder="e-mail" required></td>
                <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
            </tr>

        </table>
        <button id="add" type="button" ><b>Añadir registro</b></button>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Insertar registros</b></button>
    </form>
    
</section>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/tablaSucursal.js') }}"></script>
</body>
</html>