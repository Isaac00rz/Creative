@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<title>Baja/Mod mantenimientos</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>Descripcion</th>
        <th>Fecha del Mantenimiento</th>
        <th>id impresora</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($matenimientos as $mantenimiento)
		<tr>
		<td>{{$mantenimiento->descripcion}}</td>
		<td>{{$mantenimiento->fechaMan}}</td>
		<td>{{$mantenimiento->id_impresora}}</td>
	
		<td>
			<a href="{{ URL('/mantenimiento/editar',$mantenimiento->id_mantenimiento) }}">Editar</a>
			<a href="{{ URL('/mantenimiento/eliminar',$Mantenimiento->id_mantenimiento) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
{{ $mantenimiento->links() }}
</section> 