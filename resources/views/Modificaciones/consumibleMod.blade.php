@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Editars Cliente</title>
<section class="contenido">
<form name="form" method="POST" action="{{ url('/Consumible/editar/formulario/editar') }}">
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td>Nombre</td>
                <td>Descripcion</td>
                <td>Existencias</td>
                <td>Precio</td>
                <td>Costo</td>
            </tr>
            @foreach ($consumible as $c)
            <tr>
                <td><input  type="text" name="nombre" maxlength = "20" placeholder="nombre" value = "{{$c->nombre}}" required></td>
                <td><input  type="text" name="Descripcion" maxlength = "20" placeholder="descripcion" value = "{{$c->descripcion}}" required></td>
                <td><input  type="number" name="Existencias" maxlength = "20" placeholder="existencias" value = "{{$c->existencias}}" required></td>
                <td><input  type="number" name="Precio" maxlength="25" placeholder="precio" value = "{{$c->precio}}" required></td>
                <td><input  type="number" name="Costo" maxlength="30" placeholder="costo" value = "{{$c->costo}}" required></td>
                
                
                <td><input  type="hidden" name="RFCV" value = "{{$c->nombre}}"></td>
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Actualizar registros</b></button>
    </form>
</section>
</body>
</html>