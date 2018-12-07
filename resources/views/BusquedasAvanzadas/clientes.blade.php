@if ($rol == 'Administrador')
    @include('Menus.admin')
@elseif ($rol == 'Usuario')
    @include('Menus.usuario')
@endif

<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/FormularioBusqueda.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/paginacion.css') }}">
<style>#paginas{
margin-left: 0%;
}</style>
<section class="contenido">
    <title>Busqueda Clientes</title>
    <h3 align="center">Busqueda de Clientes</h3>
    <form id = "Busqueda" role="form" method="post" action="{{ url('/Clientes/buscarNombre') }}">
{!! csrf_field() !!}
<legend>Busqueda</legend>
<p>
    <label for ="nombre">Nombre Cliente:</label> 
	<input type="text" name = "nombre" id = "nombre" size = "30" maxlength = "20" placeholder="Nombre" autofocus required><br/>
    <input type="hidden" name = "rol" id = "rol" value="{{$rol}}"><br/>
</p>
</form>
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
    <br>
{{ $clientes->links('paginacion.paginacion') }}
<br><br><br><br>
    <button class="boton" onclick="location.href='{{ url('/Reportes/Clientes/pdf',$parametro) }}'">Generar PDF</button>

</section>