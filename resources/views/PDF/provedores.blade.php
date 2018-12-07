<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
<img src="C:\xampp\htdocs\Creative\public\logo.png" height="150" width="250">
<div class="col-md-5" align="right">
<?php
$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
echo "Fecha: ";
echo $hora->format('Y-m-d');
?>
<br />
<?php
echo "Hora: ";
$hora2 = new DateTime("now", new DateTimeZone('America/Mexico_City'));
echo $hora2->format('H:i:s');
 ?>
</div>
    <title>Busqueda Provedores</title>
    <h3 align="center">Busqueda de Provedores</h3>
    <div id="tabla">
        <table cellspacing="0">
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>CP</th>
        <th>Direccion</th>
        <th>Correo</th>
		<th>Telefono</th>
        <th>Descripción</th>
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
		</tr>
	@endforeach
</table>
    </div>
</html>