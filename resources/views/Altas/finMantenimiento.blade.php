@include('Menus.usuario')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Alta Compatibilidad</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/Altas/altaFinMan') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Mantenimiento</td>
                <td class="tds">Descripcion</td>
                <td class="tds">Fecha</td>
                <td class="tds">Extras</td>
                <td class="tds">Empleado</td>
                <td class="tds">Eliminar</td>
            </tr>
            <tr>
                <td class="tds"><select name="id_mantenimiento[]" required>
                @foreach ($mantenimientos as $mantenimiento)
                    <option value="{{$mantenimiento->id_Mantenimiento}}"> {{$mantenimiento->etiqueta}}</option>
                @endforeach
                </select></td>
                <td class="tds"><input class="inputs" type="text" name="descripcion[]" maxlength = "1150" placeholder="Descripcion" required></td>
                <td class="tds"><input class="inputs" type="date" name="fecha[]" maxlength = "20" placeholder="Fecha" required></td>
                <td class="tds"><input class="inputs" type="text" name="extras[]" maxlength = "250" placeholder="Extras" required></td>
                </select></td>
                <td class="tds"><select name="id_empleado[]" required>
                @foreach ($empleados as $empleado)
                    <option value="{{$empleado->id_empleado}}"> {{$empleado->nombre}}</option>
                @endforeach
                </select></td>
                <td class="tds"><input class="inputs" type="reset" class="noEliminar" value="Eliminar" /></td>
            </tr>

        </table>
        <button id="add" type="button" onClick="agregar();" ><b>Añadir registro</b></button>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Insertar registros</b></button>
    </form>
    
</section>
<script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
<script>
    function agregar() {
    var tds = '<tr>';
    tds += '<td class="tds"><select name="id_mantenimiento[]" required> @foreach ($mantenimientos as $mantenimiento)<option value="{{$mantenimiento->id_Mantenimiento}}"> {{$mantenimiento->etiqueta}}</option> @endforeach</select></td>' 
    tds += '<td class="tds"><input class="inputs" type="text" name="descripcion[]" maxlength = "1150" placeholder="Descripcion" required></td>'            
    tds += '<td class="tds"><input class="inputs" type="date" name="fecha[]" maxlength = "20" placeholder="Fecha" required></td>'
    tds += '<td class="tds"><input class="inputs" type="text" name="extras[]" maxlength = "250" placeholder="Extras" required></td>'
    tds += '<td class="tds"><select name="id_empleado[]" required>@foreach ($empleados as $empleado)<option value="{{$empleado->id_empleado}}"> {{$empleado->nombre}}</option> @endforeach </select></td>'
    tds += '<td style="width: 11%; min-width: 11%"><input type="button" class="borrar" value="Eliminar" style="min-width: 100%; width:100%;"/></td>'
    tds += '</tr>'
    $("#tab").append(tds);
}

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
</script>
</body>
</html>