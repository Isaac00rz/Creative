@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<title>Baja/Mod Impresora</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Existencias</th>
		<th>Precio</th>
		<th>Costo</th>
		<th>Precio Renta</th>
		<th>Fecha de Compra</th>
		<th>Accion</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($impresoras as $impresora)
		<tr>
		<td>{{$impresora->modelo}}</td>
		<td>{{$impresora->marca}}</td>
		<td>{{$impresora->existencias}}</td>
		<td>{{$impresora->precio}}</td>
        <td>{{$impresora->costo}}</td>
        <td>{{$impresora->precioRenta}}</td>
        <td>{{$impresora->FechaCompra}}</td>
		<td>
			<a href="{{ URL('/Impresora/editar',$impresora->id_impresora) }}">Editar</a>
			<a href="{{ URL('/Impresora/eliminar',$impresora->id_impresora) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
<br>
{{ $impresoras->links('paginacion.paginacion') }}
</section> 