@if ($rol == 'Administrador')
    @include('Menus.admin')
@elseif ($rol == 'Usuario')
    @include('Menus.usuario')
@endif
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/FormularioBusqueda.css') }}">
<section class="contenido">
    <title>Busqueda Compatibilidad</title>
    <h3 align="center">Busqueda de Compatibilidad</h3>
    <form id = "Busqueda" role="form" method="post" action="{{ url('/Compatibilidad/buscarConsumible') }}">
{!! csrf_field() !!}
<legend>Busqueda</legend>
<p>
    <label for ="nombre">ID Impresora:</label> 
	<select name="id_impresora" required>
                @foreach ($impresoras as $impresora)
                    <option value="{{$impresora->id_impresora}}"> {{$impresora->nombre}}</option>
                @endforeach
    </select>
    <input type="hidden" name = "rol" id = "rol" value="{{$rol}}"><br/>
    <input type="submit" value="Buscar">            
</p>
</form>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID Consumible</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Existencias</th>
                <th>Precio</th>
                <th>Costo</th>
            </tr>
        </table>
    </div>
</section>