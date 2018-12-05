<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTablaPDF.css') }}"/>
    <title>Busqueda Compatibilidad</title>
    <h3 align="center">Busqueda de Compatibilidad</h3>
    <hr>
    </br>
    </br>
    <h1>ID Impresora: {{$parametro}}</h1>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID Consumible</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Existencias</th>
                <th>Precio</th>
                <th>Costo</th>
            </tr>
            @foreach ($consumibles as $consumible)
            <tr>
                <td>{{$consumible->id_consumible}}</td>
                <td>{{$consumible->nombre}}</td>
                <td>{{$consumible->descripcion}}</td>
                <td>{{$consumible->existencias}}</td>
                <td>{{$consumible->precio}}</td>
                <td>{{$consumible->costo}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</html>