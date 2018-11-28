@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<title>Baja/Mod cliente</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>RFC</th>
        <th>Nombre</th>
        <th>CP</th>
        <th>Direccion </th>
        <th>Correo </th>
		<th>Telefono Personal </th>
		<th>Accion</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($clientes as $cliente)
		<tr>
		<td>{{$cliente->rfc}}</td>
		<td>{{$cliente->nombreC}}</td>
		<td>{{$cliente->cp}}</td>
		<td>{{$cliente->direccion}}</td>
		<td>{{$cliente->correo}}</td>
        <td>{{$cliente->telefonoPersonal}}</td>
		<td>
			<a href="{{ URL('/Cliente/editar',$cliente->rfc) }}">Editar</a>
			<a href="{{ URL('/Cliente/eliminar',$cliente->rfc) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
{{ $clientes->links() }}
</section> 