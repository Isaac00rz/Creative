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
    <title>Busqueda Impresoras</title>
    <h3 align="center">Busqueda de Impresoras</h3>
    <div id="tabla">
        <table cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Existencias</th>
            <th>Precio</th>
            <th>Costo</th>
            <th>Precio Renta</th>
            <th>Fecha de Compra</th>
            </tr>
            @foreach ($impresoras as $impresora)
            <tr>
                <td>{{$impresora->id_impresora}}</td>
                <td>{{$impresora->modelo}}</td>
                <td>{{$impresora->marca}}</td>
                <td>{{$impresora->existencias}}</td>
                <td>{{$impresora->precio}}</td>
                <td>{{$impresora->costo}}</td>
                <td>{{$impresora->precioRenta}}</td>
                <td>{{$impresora->FechaCompra}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</html>
