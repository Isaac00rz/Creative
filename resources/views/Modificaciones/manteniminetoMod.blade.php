@include('Menus.Usuario')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Editar Mantenimiento</title>
<section class="contenido">
<form name="form" method="POST" action="{{ url('/editarMantenimiento') }}">
    {!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td>descripcion</td>
                <td>Fecha Del Mantenimiento</td>
                <td>id_impresora</td>
                
            </tr>
            @foreach ($mantenimiento as $i)
            <tr>
                <td><input  type="text" name="descripcion" maxlength = "50" placeholder="descripcion" value = "{{$i->descripcion}}" required></td>

                <td><input  type="date" name="fechaMan" maxlength = "50"  value = "{{$i->fechaMan}}" required></td>
                
                <td> <input type="number" name="id_impresora[]" maxlength="30" placeholder="id_impresora" value="{{$i->id_impresora}}" required></td>
            


                <td><input  type = "hidden" name="id_mantenimiento" value = "{{$i->id_mantenimiento}}" required></td>
                
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Actualizar registros</b></button>
    </form>
</section>
</body>
</html>