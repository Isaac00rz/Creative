@include('Menus.Usuario')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>
<title>Alta De Mantenimientos</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/Altas/mantenimientoAlta') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Descripcion</td>
                <td class="tds">Fecha del Mantenimiento</td>
                <td class="tds">id_impresora</td>
                <td class="tds">Eliminar</td>
            </tr>
            <tr>
            <td class="tds" ><select name="id_impresora[]" required>
                @foreach ($impresoras as $impresora)
                    <option value="{{$impresora->id_impresora}}"> {{$impresora->nombre}}</option>
                @endforeach
                </select></td>
                <td class="tds"><input class="inputs" type="text" name="descripcion[]" maxlength = "50" placeholder="descripcion" required></td>
                <td class="tds"><input class="inputs" type="date" name="fechaMan[]" maxlength="30"  required></td>
                <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
            </tr>

        </table>
        <button id="add" type="button" ><b>Añadir registro</b></button>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Insertar registros</b></button>
        
        

    </form>
    
</section>
<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
<script>
$("#add").click(function () {
    var tds = '<tr>';
    tds += '<td class="tds"><select name="id_impresora[]" required> @foreach ($impresoras as $impresora)<option value="{{$impresora->id_impresora}}"> {{$impresora->nombre}}</option>@endforeach</select></td>' 
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="text" name="descripcion[]" maxlength = "50" placeholder="descripcion" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="date" name="fechaMan[]" maxlength="30" required style="text-align: center; min-width: 100%; width:100%;"></td>'
    tds += '<td style="width: 8.1818%; min-width: 8.18%;"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>';

    $("#tab").append(tds);
});

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
</script>
</body>
</html>