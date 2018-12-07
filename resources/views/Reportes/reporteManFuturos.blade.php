@include('Menus.usuario')
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<section class="contenido">
    <title> Mantenimiento Futuros</title>
    <h3 align="center">Mantenimietos Futuros</h3>
    <button class="boton" onclick="location.href='{{ url('/Reportes/Mantenimiento/Pendientes/pdf') }}'">Generar PDF</button>
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
    {{ $reportes->links('paginacion.paginacion') }}
    <br>
    <br>
    <br>
    
</section>