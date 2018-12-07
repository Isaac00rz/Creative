@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Alta Impresora</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/Altas/Impresoras/altaImpresora') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Modelo</td>
                <td class="tds">Marca</td>
                <td class="tds">Existencias</td>
                <td class="tds">Precio</td>
                <td class="tds">Costo</td>
                <td class="tds">Precio de Renta</td>
                <td class="tds">Fecha de Compra</td>
                <td class="tds">Eliminar</td>
            </tr>
            <tr>
                <td class="tds"><input class="inputs" type="text" name="modelo[]" maxlength = "20" placeholder="modelo" required></td>
                <td class="tds"><input class="inputs" type="text"name="marca[]" maxlength = "20" placeholder="marca" required></td>
                <td class="tds"><input class="inputs" type="number" name="existencias[]" min="1" placeholder="existencias" required></td>
                <td class="tds"><input class="inputs" type="number" name="precio[]" min="1" placeholder="precio" required></td>
                <td class="tds"><input class="inputs" type="number" name="costo[]" min="1" placeholder="costo" required></td>
                <td class="tds"><input class="inputs" type="number"name="pRenta[]" min="1" placeholder="precio de renta" required></td>
                <td class="tds"><input class="inputs" type="date" name="fCompra[]" required></td>
                <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
            </tr>

        </table>
        <button id="add" type="button" ><b>Añadir registro</b></button>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Insertar registros</b></button>
    </form>
    
</section>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/tabla.js') }}"></script>
</body>
</html>