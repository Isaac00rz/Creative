@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<title>Baja/Mod Compatibilidad </title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>id_consumible</th>
		<th>id_impresora</th>
		<th>Acción</th>
       
	</tr>
	</thead>
	<tbody>
	
	 @foreach ($compatibilidad as $compatibilidades)
	 	<tr>
		<td>{{$compatibilidades->nombreI}}</td>
		<td>{{$compatibilidades->nombreC}}</td>
		 <td><a href="{{ URL('/Compatibilidad/eliminar/'.$compatibilidades->id_consumible,$compatibilidades->id_impresora) }}">Eliminar</a></td>
		 </tr>
 @endforeach

</table>
<br>
{{ $compatibilidad->links('paginacion.paginacion') }}
</section> 