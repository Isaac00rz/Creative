<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
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