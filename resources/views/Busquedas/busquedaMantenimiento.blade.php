@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<title>Baja/Mod mantenimientos</title>
<section class="contenido">
<table id="tabla" >
	<thead>
	<tr>
		<th>ID Mantenimiento</th>
		<th>ID impresora</th>
        <th>Descripcion</th>
        <th>Fecha del Mantenimiento</th>
		<th>Accion</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($mantenimientos as $mantenimiento)
		<tr>
		<td>{{$mantenimiento->id_Mantenimiento}}</td>
		<td>{{$mantenimiento->id_impresora}}</td>
		<td>{{$mantenimiento->descripcion}}</td>
		<td>{{$mantenimiento->fechaMan}}</td>
		<td>
			<a href="{{ URL('/mantenimiento/editar',$mantenimiento->id_Mantenimiento) }}">Editar</a>
			<a href="{{ URL('/mantenimiento/eliminar',$mantenimiento->id_Mantenimiento) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
<br>
{{ $mantenimientos->links('paginacion.paginacion') }}
</section> 