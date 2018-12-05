<!DOCTYPE html>
<html lang ="en">
 <head>
 	<meta charset="utf-8"> 
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="le=edge">
	<title>Programacion</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">	
		<div class="jumbotron">
	<form action="{{action('EventController@update',$id)}}" method="POST">
		{{csrf_field()}}
	<div class="container">	
		<div class="jumbotron" style="margin-top:5%;">
			<h1>Actualizar Datos</h1>
			<hr>
				<input type="hidden" name="_method" value="UPDATE" />
		<div class="form-group">
			<label>Nombre del Evento</label>
		<input type="text" class="form-control" name="title" placeholder="nombre" value="{{$events->title}}">
		</div>

		<div class="form-group">
		<label for=""> color </label> 
		<input type="color" class="form-control" name="color" placeholder="color" value="{{$events->color}}">
		</div>

		<div class="form-group">
			<label>fecha de inicio</label>
		<input type="date" class="form-control" name="FechaInicio" class="date" placeholder="Fecha de inicio" value="{{$events->FechaInicio}}">
		</div>

		<div class="form-group">
			<label>fecha de fin</label>
		<input type="date" class="form-control" name="FechaFin" class="date" placeholder="Fecha de fin" value="{{$events->FechaFin}}">
		</div> 
		{{method_field('PUT')}}

		<button type="submit" name="submit" class="btn btn-success">Actualizar</button>
	</div>
</div>

</div>
</form>
</div>
</body>	
</html>
