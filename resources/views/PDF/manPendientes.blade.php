<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
</head>
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
    <title>Reporte Mantenimiento Pendiente</title>
    <h3 align="center">Mantenimieto Pendiente</h3>
        <table cellspacing="0">
        <tr>
                <th>ID Mantenimiento</th>
                <th>ID Impresora</th>
                <th>Modelo</th>
                <th>Descripcion</th>
                <th>Fecha de mantenimiento</th>
                <th>Estado</th>
            </tr>
            @foreach ($reportes as $reporte)
            <tr>
                <td>{{$reporte->id_Mantenimiento}}</td>
                <td>{{$reporte->id_impresora}}</td>
                <td>{{$reporte->modelo}}</td>
                <td>{{$reporte->descripcion}}</td>
                <td>{{$reporte->fechaMan}}</td>
                <td>Pendiente</td>
            </tr>
            @endforeach
        </table>
</html>