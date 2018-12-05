@include('Menus.usuario')
{!! csrf_field() !!}

<section class="contenido">
<!DOCTYPE html>
<html lang ="en">
 <head>
 	<meta charset="utf-8"> 
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="le=edge">
	<title>Calendario</title>
    <link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">

	<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>
<body>
	
	<div class="container">
		<div class="jumbotron">
			<h2>Calendario De Eventos</h2>
<div class="row">
 <button class="boton" onclick="location.href='{{ url('/usuario/addeventurl') }}'">Agregar eventos</button>

 <button class="boton" onclick="location.href='{{ url('/usuario/displaydata') }}'">editar eventos</button>

 <button class="boton" onclick="location.href='{{ url('/usuario/deleteEventsurl') }}'">eliminar eventos</button>

</div>
<br>
		<div class="row">

			@if(count($errors)>0)
			 <div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			 </div>
			@endif
	@if(\Session::has('success'))
	   <div class="alert alert-success">
	    	<p>{{\Session::get('success')}}</p>
	   </div>			
	@endif  	

			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading" style="background: #2e6da4; color: white">
						Calendario [Mantenimientos]
					</div>
					
					<div class="panel-body">
						{!! $calendar->calendar() !!}
    					{!! $calendar->script() !!}
				</div>
			</div>
		</div>
	    </div>
	</div>						
</div>
</section>
</body>	
</html>