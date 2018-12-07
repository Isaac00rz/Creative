@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<title>Baja/Mod Provedor</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>CP</th>
        <th>Dirección</th>
        <th>Correo</th>
		<th>Teléfono</th>
        <th>Descripción</th>
		<th>Acción</th>
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
		<td>
			<a href="{{ URL('/Provedor/editar',$provedor->id_provedor) }}">Editar</a>
			<a href="{{ URL('/Provedor/eliminar',$provedor->id_provedor) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
<br>
{{ $provedores->links('paginacion.paginacion') }}
</section> 