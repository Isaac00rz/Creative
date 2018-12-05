@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/tablaDatos.css') }}">
<title>Baja/Mod Usuario</title>
<section class="contenido">
<table id="tabla" cellpadding = "0" cellspacing="0">
	<thead>
	<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Nombre de Usuario</th>
        <th>Correo</th>	
        <th>Acción</th>
	</tr>
	</thead>
	<tbody>
	@foreach ($users as $user)
		<tr>
		<td>{{$user->id}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->username}}</td>
		<td>{{$user->email}}</td>
		<td>
			<a href="{{ URL('/Usuario/editar',$user->id) }}">Editar</a>
			<a href="{{ URL('/Usuario/eliminar',$user->id) }}">Eliminar</a>
		</td>
		</tr>
	@endforeach
</table>
{{ $users->links() }}
</section> 