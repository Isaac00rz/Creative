@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<title>Baja/Mod Compatibilidad </title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>id_consumible</th>
        <th>id_impresora</th>
       
	</tr>
	</thead>
	<tbody>
	
	 @foreach ($compatibilidad as $compatibilidades)
	 	<tr>
		<td>{{$compatibilidades->id_consumible}}</td>
		<td>{{$compatibilidades->id_impresora}}</td>
		 <td><a href="{{ URL('/Compatibilidad/eliminar'.$compatibilidades->id_consumible,$compatibilidades->id_impresora) }}">Eliminar</a></td>
		 </tr>
 @endforeach

</table>
</section> 