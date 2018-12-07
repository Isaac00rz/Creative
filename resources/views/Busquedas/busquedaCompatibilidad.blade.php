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
	
	 @foreach ($impresoras as $impresora)
	  @foreach ($consumibles as $consumible)
	 	<tr>
		<td>{{$impresora->nombre}}</td>
		<td>{{$consumible->nombre}}</td>
		 <td><a href="{{ URL('/Compatibilidad/eliminar',$consumible->id_consumible) }}">Eliminar</a></td>
	</tr>
	  @endforeach
	  @endforeach


</table>
</section> 