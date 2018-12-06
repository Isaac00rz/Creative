@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<link rel = "stylesheet" href = "{{ asset('css/FormularioBusqueda.css') }}">
<section class="contenido">
    <title>Busqueda Empleados</title>
    <h3 align="center">Busqueda de Empleados</h3>
    <form id = "Busqueda" role="form" method="post" action="{{ url('/Empleados/buscarNombre') }}">
{!! csrf_field() !!}
<legend>Busqueda</legend>
<p>
    <label for ="nombre">Nombre Empleado:</label> 
	<input type="text" name = "nombre" id = "nombre" size = "30" maxlength = "20" placeholder="Nombre" autofocus required><br/>
</p>
</form>
    <div id="tabla">
        <table cellspacing="0">
            <th>ID</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo apellido</th>
            <th>Dirección</th>
            <th>Colonia</th>
            <th>CP</th>
            <th>Celular</th>
            <th>Correo</th>
            @foreach ($Empleados as $empleado)
		    <tr>
                <td>{{$empleado->id_empleado}}</td>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->apellidoP}}</td>
                <td>{{$empleado->apellidoM}}</td>
                <td>{{$empleado->direccion}}</td>
                <td>{{$empleado->colonia}}</td>
                <td>{{$empleado->CP}}</td>
                <td>{{$empleado->Telefono}}</td>
                <td>{{$empleado->correo}}</td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $Empleados->links() }}
    <button class="boton" onclick="location.href='{{ url('/Reportes/Empleados/pdf',$parametro) }}'">Generar PDF</button>

</section>