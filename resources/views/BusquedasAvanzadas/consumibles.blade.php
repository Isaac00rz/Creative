@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/FormularioBusqueda.css') }}">
<section class="contenido">
    <title>Busqueda Consumibles</title>
    <h3 align="center">Busqueda de Consumibles</h3>
    <form id = "Busqueda" role="form" method="post" action="{{ url('/Consumible/buscarNombre') }}">
{!! csrf_field() !!}
<legend>Busqueda</legend>
<p>
    <label for ="nombre">Nombre Consumible:</label> 
	<input type="text" name = "nombre" id = "nombre" size = "30" maxlength = "20" placeholder="Nombre" autofocus required><br/>
</p>
</form>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID</th>
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
    {{ $consumibles->links() }}
    <button class="boton" onclick="location.href='{{ url('/Reportes/Mantenimiento/General/pdf') }}'">Generar PDF</button>

</section>