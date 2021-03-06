@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<section class="contenido">
    <title>Reporte Mantenimiento General</title>
    <h3 align="center">Mantenimieto General</h3>
    <button class="boton" onclick="location.href='{{ url('/Reportes/Mantenimiento/General/pdf') }}'">Generar PDF</button>

    <div id="tabla">
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
    </div>
    {{ $reportes->links('paginacion.paginacion') }}
    <br>
    <br>
    <br>
   
</section>