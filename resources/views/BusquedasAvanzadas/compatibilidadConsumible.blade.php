@if ($rol == 'Administrador')
    @include('Menus.admin')
@elseif ($rol == 'Usuario')
    @include('Menus.usuario')
@endif
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/FormularioBusqueda.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<style>#paginas{
margin-left: 0%;
}</style>
<section class="contenido">
    <title>Busqueda Consumibles</title>
    <h3 align="center">Busqueda de Consumibles</h3>
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
<hr>
</br>
</br>
<h1>ID Impresora: {{$parametro}}</h1>
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
            @foreach ($consumibles as $consumible)
            <tr>
                <td>{{$consumible->id_consumible}}</td>
                <td>{{$consumible->nombre}}</td>
                <td>{{$consumible->descripcion}}</td>
                <td>{{$consumible->existencias}}</td>
                <td>{{$consumible->precio}}</td>
                <td>{{$consumible->costo}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>
{{ $consumibles->links('paginacion.paginacion') }}
<br><br><br><br>
    <button class="boton" onclick="location.href='{{ url('/Reportes/Compatibilidad/pdf',$parametro) }}'">Generar PDF</button>

</section>