<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
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
