@include('Menus.Usuario')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Editar Mantenimiento</title>
<section class="contenido">
<form name="form" method="POST" action="{{ url('/editarMantenimiento') }}">
    {!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <th>ID Mantenimiento</th>
                <td>ID Impresora</td>
                <td>descripcion</td>
                <td>Fecha Del Mantenimiento</td>
                
                
            </tr>
            @foreach ($mantenimiento as $i)
            <tr>
                <td><input  type = "text" name="id_mantenimiento2" value = "{{$i->id_mantenimiento}}" disabled></td>
                <td class="tds" ><select name="id_impresora" required>
                @foreach ($impresoras as $impresora)
                    @if($i->id_impresora == $impresora->id_impresora)
                        <option value="{{$impresora->id_impresora}}" selected> {{$impresora->nombre}}</option>
                    @else
                        <option value="{{$impresora->id_impresora}}"> {{$impresora->nombre}}</option>
                    @endif
                    
                @endforeach
                </select></td>
                <td><input  type="text" name="descripcion" maxlength = "150" placeholder="descripcion" value = "{{$i->descripcion}}" required></td>
                <td><input  type="date" name="fechaMan" value = "{{$i->fechaMan}}" required></td>
                <td><input  type = "hidden" name="id_mantenimiento" value = "{{$i->id_mantenimiento}}"></td>
                
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Actualizar registros</b></button>
    </form>
</section>
</body>
</html>