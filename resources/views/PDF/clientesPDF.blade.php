<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
    <title>Busqueda Clientes</title>
    <h3 align="center">Busqueda de Clientes</h3>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
            <th>RFC</th>
            <th>Nombre</th>
            <th>CP</th>
            <th>Direccion </th>
            <th>Correo </th>
            <th>Telefono Personal </th>
            <th>Telefono Fijo </th>
            </tr>
            @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->rfc}}</td>
                <td>{{$cliente->nombreC}}</td>
                <td>{{$cliente->cp}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->telefonoPersonal}}</td>
                <td>{{$cliente->telefonoFijo}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</html>