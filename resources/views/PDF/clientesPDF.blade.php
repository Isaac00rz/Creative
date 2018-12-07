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
    <title>Busqueda Clientes</title>
    <h3 align="center">Busqueda de Clientes</h3>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
            <th>RFC</th>
            <th>Nombre</th>
            <th>CP</th>
            <th>Direccion </th>
            <th>Correo </th>
            <th>Telefono Personal </th>
            <th>Telefono Fijo </th>
            </tr>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->rfc}}</td>
                <td>{{$cliente->nombreC}}</td>
                <td>{{$cliente->cp}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->telefonoPersonal}}</td>
                <td>{{$cliente->telefonoFijo}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</html>