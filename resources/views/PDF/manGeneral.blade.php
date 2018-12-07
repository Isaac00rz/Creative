<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
</head>
<img src="C:\xampp\htdocs\Creative\public\logo.png" height="150" width="250">
    <title>Reporte Mantenimiento General</title>
    <h3 align="center">Mantenimieto General</h3>
        <table cellspacing="0">
            <tr>
                <th>ID Mantenimiento</th>
                <th>ID Impresora</th>
                <th>Modelo</th>
                <th>Descripcion</th>
                <th>Fecha de mantenimiento</th>
                <th>Fecha de finalizado</th>
                <th>Empleado</th>
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
                @if ($reporte->fecha != null)
                    <td>Finalizado</td>
                    @else
                    <td>Pendiente</td>
                @endif
            </tr>
            @endforeach
        </table>
</html>