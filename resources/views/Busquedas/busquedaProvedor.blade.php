@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<title>Baja/Mod Provedor</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>Id_provedor</th>
        <th>Nombre</th>
        <th>CP</th>
        <th>Direccion </th>
        <th>Correo </th>
		<th>Telefono Personal </th>
        <th>Descripción</th>
		<th>Accion</th>
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
{{ $provedores->links() }}
</section> 