@include('Menus.admin');
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<title>Alta De La Sucursal</title>
<section class="contenido">
<form role="form" method="post" action="{{ url('/Altas/Sucursal/altaSucursal') }}">
		{!! csrf_field() !!}

		 <fieldset>
		 	<legend>Datos De La Sucursal</legend>
		 	<p>
		 	<center>	
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Sucursal">Nombre</label>: 
			
			<input type="text" id ="Sucursal" name="Sucursal" size = "27" maxlength = "25" required/>
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Direccion">Direccion</label>:
			
			<input type="text" id ="Direccion" name="Direccion" size = "32" maxlength = "30" required/>
			</p></center>

			</br>
			<p>
			<center>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Colonia">Colonia</label>:
			
			<input type="text" id ="Colonia" name="Colonia" size = "27" maxlength = "25" required/>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			<label for ="CP">CP</label>:
			
			<input type="postal-code" id ="CP" name="CP" size = "10" maxlength = "10" required/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<label for ="Telefono">Telefono</label>:
			
			<input type="tel" id ="Telefono" name="Telefono" size = "10" maxlength = "10" required/>
			</p></center>
 			</br>

			<p>
			<center>
			<label for ="Correo">Correo</label>:
			
			<input type="email" id ="Correo" name="Correo" size = "35" maxlength = "35" required/>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <label for ="FechaCreacion">Fecha De Creacion</label>:
			
			<input type="date" id ="FechaCreacion" name="FechaCreacion" required/>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Activo">Activo</label>:

			<input type="text" id ="Activo" name="Activo" size = "10" maxlength = "10" />
			
		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Id">Id</label>:

			<input type="text" id ="Id" name="Id" size = "12" maxlength = "10" />
			</center>
			</p>

		 </fieldset>				
				<hr>
				<div class = "boton">
					<input type="submit" value="Agregar" ></code>	
				</div>
	</form>
 </section>   