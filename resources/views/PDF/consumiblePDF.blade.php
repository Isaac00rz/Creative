<html>
<head>
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
    <title>Busqueda Consumibles</title>
    <h3 align="center">Busqueda de Consumibles</h3>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID</th>
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
