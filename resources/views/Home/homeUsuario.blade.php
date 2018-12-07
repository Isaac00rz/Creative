@include('Menus.usuario')
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<style>#paginas{
margin-left: 0%;
}</style>
<title>Home</title>
<section class="contenido">
    <h3 align="center">Mantenimietos Pendientes</h3>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID Mantenimiento</th>
                <th>ID Impresora</th>
                <th>Modelo</th>
                <th>Descripción</th>
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
<<<<<<< HEAD
=======

>>>>>>> fef2f3352cd223e7c330cc8d88ce1fcff65d9bc4
</section>
</body>
</html>