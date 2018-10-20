@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<title>Alta De La Sucursal</title>
<section class="contenido">
<form role="form" method="post" action="{{ url('/Altas/Sucursal/altaSucursal') }}">
		{!! csrf_field() !!}

		 <fieldset class="sucursal">
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

			
			</center>
			</p>
			<br><br>
				<div class = "boton">
					<input type="submit" value="Agregar" ></code>	
				</div> 	

		 </fieldset>				
	</form>
 </section>   