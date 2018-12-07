<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF2.css') }}"/>
</head>
<img src="C:\xampp\htdocs\Creative\public\logo.png" height="150" width="250">
    <title>Reporte Mantenimiento Finalizado</title>
    <h3 align="center">Mantenimieto Finalizado</h3>
        <table cellspacing="0">
        <tr>
                <th>ID Mantenimiento</th>
                <th>ID Impresora</th>
                <th>Modelo</th>
                <th>Descripcion</th>
                <th>Fecha de mantenimiento</th>
                <th>Fecha de finalizado</th>
                <th>Empleado</th>
                <th>Notas</th>
                <th>Estado</th>
            </tr>
            @foreach ($reportes as $reporte)
            <tr>
                <td>{{$reporte->id_Mantenimiento}}</td>
                <td>{{$reporte->id_impresora}}</td>
                <td>{{$reporte->modelo}}</td>
                <td>{{$reporte->descripcion}}</td>
                <td>{{$reporte->fechaMan}}</td>
                <td>{{$reporte->fecha}}</td>
                <td>{{$reporte->nombreC}}</td>
                <td>{{$reporte->notas}}</td>
                <td>Finalizado</td>
            </tr>
            @endforeach
        </table>
</html>