@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<title>Baja/Mod Consumible</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Existencias</th>
		<th>Precio</th>
		<th>Costo</th>
		<th>Accion</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($consumibles as $consumible)
		<tr>
		<td>{{$consumible->nombre}}</td>
		<td>{{$consumible->descripcion}}</td>
		<td>{{$consumible->existencias}}</td>
		<td>{{$consumible->precio}}</td>
        <td>{{$consumible->costo}}</td>
		<td>
			<a href="{{ URL('/Consumible/editar',$consumible->nombre) }}">Editar</a>
			<a href="{{ URL('/Consumible/eliminar',$consumible->nombre) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
{{ $consumibles->links() }}
</section> 