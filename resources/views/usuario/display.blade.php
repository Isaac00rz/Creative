<!DOCTYPE html>
<html lang ="en">
 <head>
 	<meta charset="utf-8"> 
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="le=edge">
	<title>Datos</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<table class="table table-striped table-bordered table-hover">
			<thead class="thead">
				<tr class="warning">
				<th>id</th>	
				<th>titulo</th>
				<th>color</th>
				<th>fecha de inicio</th>
				<th>fecha de fin</th>
				<th>actualizar / editar</th>
				<th>eliminar</th>
			</tr>
        </thead> 
 	@foreach($events as $event)
 	<tbody>
 		<tr>
 			<td>{{$event->id}}</td>
 			<td>{{$event->title}}</td>
 			<td>{{$event->color}}</td>
 			<td>{{$event->FechaInicio}}</td>
 			<td>{{$event->FechaFin}}</td> 

 			<th> <a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success"> 
 				Editar</a>	
 			</th>

 			<th>
 				<form method="POST" action="{{action('EventController@destroy',$event['id'])}}">
 					{{csrf_field()}}
 					<input type="hidden" name="_method" value="DELETE"/>
 					<button type="submit" class="btn btn-danger">Eliminar</button>

 			</th>


 		</tr>
 	</tbody>
 	@endforeach
 </table>
 <a href="{{ url('/usuario/events') }}" class="btn btn-danger">Back</a>
		</div>	
	</div>	

</body>	
</html>