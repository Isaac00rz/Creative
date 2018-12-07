<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
</head>
<img src="C:\xampp\htdocs\Creative\public\logo.png" height="150" width="250">
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