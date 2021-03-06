@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<title>Baja/Mod Consumible</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Existencias</th>
		<th>Precio</th>
		<th>Costo</th>
		<th>Acción</th>
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
			<a href="{{ URL('/Consumible/editar',$consumible->id_consumible) }}">Editar</a>
			<a href="{{ URL('/Consumible/eliminar',$consumible->id_consumible) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
<br>
{{ $consumibles->links('paginacion.paginacion') }}
</section> 