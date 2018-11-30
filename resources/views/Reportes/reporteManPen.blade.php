@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<section class="contenido">
    <title>Reporte Mantenimiento Pendientes</title>
    <h3 align="center">Mantenimietos Pendientes</h3>
    <div id="tabla">
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
    </div>
</section>