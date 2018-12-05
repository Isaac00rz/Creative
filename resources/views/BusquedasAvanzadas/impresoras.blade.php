@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/FormularioBusqueda.css') }}">
<section class="contenido">
    <title>Busqueda Impresoras</title>
    <h3 align="center">Busqueda de Impresoras</h3>
    <form id = "Busqueda" role="form" method="post" action="{{ url('/Impresoras/buscarModelo') }}">
{!! csrf_field() !!}
<legend>Busqueda</legend>
<p>
    <label for ="nombre">Modelo Impresora:</label> 
	<input type="text" name = "nombre" id = "nombre" size = "30" maxlength = "20" placeholder="Modelo" autofocus required><br/>
</p>
</form>
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
    {{ $impresoras->links() }}
    <button class="boton" onclick="location.href='{{ url('/Reportes/Impresoras/pdf',$parametro) }}'">Generar PDF</button>

</section>