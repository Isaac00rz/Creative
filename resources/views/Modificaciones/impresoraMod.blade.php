@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Editar Impresora</title>
<section class="contenido">
<form name="form" method="POST" action="{{ url('/editarImpresora') }}">
    {!! csrf_field() !!}
        <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td>Modelo</td>
                <td>Marca</td>
                <td>Existencias</td>
                <td>Precio</td>
                <td>Costo</td>
                <td>precioRenta</td>
                <td>FechaCompra</td>
            </tr>
            @foreach ($impresoras as $i)
            <tr>
                <td><input  type="text" name="modelo" maxlength = "20" placeholder="nombre" value = "{{$i->modelo}}" required></td>
                <td><input  type="text" name="marca" maxlength = "20" placeholder="descripcion" value = "{{$i->marca}}" required></td>

                <td><input  type="number" name="existencias" maxlength="20" placeholder="existencias" value = "{{$i->existencias}}" required></td>

                <td><input  type="number" name="precio" maxlength="20" placeholder="precio" 
                    value = "{{$i->precio}}" required></td>

                <td><input  type="number" name="costo" maxlength="20" placeholder="costo" value = "{{$i->costo}}" required></td>

                <td><input  type="number" name="precioRenta" maxlength="20" placeholder="precio de renta" value = "{{$i->precioRenta}}" required></td>

                <td><input  type="date" name="FechaCompra" placeholder="fecha de compra" value = "{{$i->FechaCompra}}" required></td>
                <td><input  type = "hidden" name="id_impresora" value = "{{$i->id_impresora}}" required></td>
                
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Actualizar registros</b></button>
    </form>
</section>
</body>
</html>