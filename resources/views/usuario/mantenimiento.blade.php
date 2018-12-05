@include('Menus.Usuario')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Alta De Mantenimientos</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/usuario/mantenimiento') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Descripcion</td>
                <td class="tds">Fecha del Mantenimiento</td>
                <td class="tds">id_impresora</td>
            </tr>
            <tr>
                <td class="tds"><input class="inputs" type="text" name="descripcion[]" maxlength = "50" placeholder="descripcion" required></td>

                <td class="tds"><input class="inputs" type="date" name="fechaMan[]" maxlength="30"  required></td>

                <td class="tds"><input class="inputs" type="number" name="id_impresora[]" maxlength="30" placeholder="id_impresora" required></td>

                <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
            </tr>

        </table>
        <button id="add" type="button" ><b>Añadir registro</b></button>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Insertar registros</b></button>
        
        

    </form>
    
</section>
<button class="boton" onclick="location.href='{{ url('/BajaMod/Mantenimiento') }}'">busqueda</button>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/tablaMantenimiento.js') }}"></script>
</body>
</html>