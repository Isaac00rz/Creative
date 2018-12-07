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
    <title>Busqueda Empleados</title>
    <h3 align="center">Busqueda de Empleados</h3>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo apellido</th>
            <th>Dirección</th>
            <th>Colonia</th>
            <th>CP</th>
            <th>Celular</th>
            <th>Correo</th>
            </tr>
            @foreach ($Empleados as $empleado)
            <tr>
            <td>{{$empleado->id_empleado}}</td>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellidoP}}</td>
                <td>{{$empleado->apellidoM}}</td>
                <td>{{$empleado->direccion}}</td>
                <td>{{$empleado->colonia}}</td>
                <td>{{$empleado->CP}}</td>
                <td>{{$empleado->Telefono}}</td>
                <td>{{$empleado->correo}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</html>