@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tabla.css') }}"/>

<title>Editar Usuario</title>
<section class="contenido">
<form role="form" name="form" method="post" action="{{ url('/editarUsuario') }}">
{{csrf_field()}}
                <table border="1" id="tab" style="display:inline-block;">
            <tr id="cabecera">
                <td>ID usuario</td>
                <td>Nombre</td>
                <td>Nombre usuario</td>
                <td>Correo</td>
            </tr>
            @foreach ($user as $c)
            <tr>
            <td><input type="text" name="id" value = "{{$c->id}}"  disabled></td>
            <td><input type="text" name="name" maxlength = "20" placeholder="nombre" value = "{{$c->name}}" required></td>
            <td><input type="text" name="username" maxlength="20" placeholder="nombre de usuario" value = "{{$c->username}}" required></td>
            <td><input type="email" name="email" maxlength="40" placeholder="email" value = "{{$c->email}}" required style="width: 250px"></td>
            <td><input type="hidden" name="idV"  value = "{{$c->id}}"></td>
            </tr>
            @endforeach
        </table>
        <button id="aceptar" name="aceptar" type="submit" 
        ><b>Actualizar registro</b></button>
    </form>
</section>
</body>
</html>