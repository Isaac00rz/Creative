<!DOCTYPE html>
<html lang ="en">
 <head>
 	<meta charset="utf-8"> 
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="le=edge">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading" style="background: #2e6da4; color: white">
						Agregar Eventos Al Calendario

					</div>
					<div class="panel-body">
						<h1>Agregar Datos</h1>
					<form method="POST" action="{{action('EventController@store')}}">
						{{ csrf_field() }}
						<label for=""> introduce nombre del evento</label> 
						<input type="text" class="form-control" name="title" placeholder="nombre" /><br /><br />
						<label for=""> color</label> 
						<input type="color" class="form-control" name="color" placeholder="color" /><br /><br />
						<label for=""> introduce fecha de inicio</label> 
						<input type="date" class="form-control" name="FechaInicio" class="date" placeholder="Fecha de inicio" /><br /><br />
				        <label for=""> introduce fecha de fin</label> 
						<input type="date" class="form-control" name="FechaFin" class="date" placeholder="Fecha de Fin" /><br /><br /> 

					<input type="submit" name="submit" class="btn btn-primary" value= "Add Event Data"/>
					<a href="{{ url('/usuario/events') }}" class="btn btn-danger">Back</a>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>				 	
</body>	
</html>