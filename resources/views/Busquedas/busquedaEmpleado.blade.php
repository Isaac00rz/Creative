@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<title>Baja/Mod Empleado</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Primer Apellido</th>
        <th>Dirección</th>
        <th>Colonia</th>
		<th>CP</th>
        <th>Celular</th>
        <th>Correo</th>
		<th>Acción</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($Empleados as $empleado)
		<tr>
		<td>{{$empleado->id_empleado}}</td>
		<td>{{$empleado->nombreC}}</td>
		<td>{{$empleado->apellidoP}}</td>
		<td>{{$empleado->direccion}}</td>
		<td>{{$empleado->colonia}}</td>
        <td>{{$empleado->CP}}</td>
        <td>{{$empleado->Telefono}}</td>
        <td>{{$empleado->correo}}</td>
		<td>
			<a href="{{ URL('/Empleado/editar',$empleado->id_empleado) }}">Editar</a>
			<a href="{{ URL('/Empleado/eliminar',$empleado->id_empleado) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
{{ $Empleados->links() }}
</section> 