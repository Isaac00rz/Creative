@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Alta Compatibilidad</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/Altas/altaCompatibilidad') }}">
{!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td class="tds">Impresora</td>
                <td class="tds">Consumible</td>
                <td class="tds">Eliminar</td>
            </tr>
            <tr>
                <td class="tds"><select name="id_impresora[]" required>
                @foreach ($impresoras as $impresora)
                    <option value="{{$impresora->id_impresora}}"> {{$impresora->nombre}}</option>
                @endforeach
                </select></td>
                <td class="tds"><select name="id_consumible[]" required>
                @foreach ($consumibles as $consumible)
                    <option value="{{$consumible->id_consumible}}"> {{$consumible->nombre}}</option>
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
    tds += '<td class="tds"><select name="id_impresora[]" required> @foreach ($impresoras as $impresora)<option value="{{$impresora->id_impresora}}"> {{$impresora->nombre}}</option>@endforeach</select></td>' 
    tds += '<td class="tds"><select name="id_consumible[]" required> @foreach ($consumibles as $consumible)<option value="{{$consumible->id_consumible}}"> {{$consumible->nombre}}</option>@endforeach </select></td>'            
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