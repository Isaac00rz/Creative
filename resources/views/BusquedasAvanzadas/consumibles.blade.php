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
    <title>Búsqueda Consumibles</title>
    <h3 align="center">Búsqueda de Consumibles</h3>
    <form id = "Busqueda" role="form" method="post" action="{{ url('/Consumible/buscarNombre') }}">
{!! csrf_field() !!}
<legend>Búsqueda</legend>
<p>
    <label for ="nombre">Nombre Consumible:</label> 
	<input type="text" name = "nombre" id = "nombre" size = "30" maxlength = "20" placeholder="Nombre" autofocus required><br/>
    <input type="hidden" name = "rol" id = "rol" value="{{$rol}}"><br/>
</p>
</form>
<button class="boton" onclick="location.href='{{ url('/Reportes/Consumibles/pdf',$parametro) }}'">Generar PDF</button>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
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
    

</section>