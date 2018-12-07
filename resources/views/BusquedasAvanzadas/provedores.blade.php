@if ($rol == 'Administrador')
    @include('Menus.admin')
@elseif ($rol == 'Usuario')
    @include('Menus.usuario')
@endif

<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/FormularioBusqueda.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<style>#paginas{
margin-left: 0%;
}</style>
<section class="contenido">
    <title>Busqueda Provedores</title>
    <h3 align="center">Busqueda de Provedor</h3>
    <form id = "Busqueda" role="form" method="post" action="{{ url('/Clientes/buscarNombre') }}">
{!! csrf_field() !!}
<legend>Busqueda</legend>
<p>
    <label for ="nombre">Nombre Provedor:</label> 
	<input type="text" name = "nombre" id = "nombre" size = "30" maxlength = "20" placeholder="Nombre" autofocus required><br/>
    <input type="hidden" name = "rol" id = "rol" value="{{$rol}}"><br/>
</p>
</form>
    <div id="tabla">
        <table cellspacing="0">
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>CP</th>
        <th>Direccion</th>
        <th>Correo</th>
		<th>Telefono</th>
        <th>Descripción</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($provedores as $provedor)
		<tr>
		<td>{{$provedor->id_provedor}}</td>
		<td>{{$provedor->nombreC}}</td>
		<td>{{$provedor->cp}}</td>
		<td>{{$provedor->direccion}}</td>
		<td>{{$provedor->correo}}</td>
        <td>{{$provedor->telefonoPersonal}}</td>
        <td>{{$provedor->descripcion}}</td>
		</tr>
	@endforeach
</table>
    </div>
    <br>
{{ $provedores->links('paginacion.paginacion') }}
<br><br><br><br>
    <button class="boton" onclick="location.href='{{ url('/Reportes/Provedores/pdf',$parametro) }}'">Generar PDF</button>

</section>