@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>
<title>Alta Del Cliente</title>
<section class="contenido">
<form role="form" method="post" action="{{ url('/Altas/Clientes/altaCliente') }}">
		{!! csrf_field() !!}

		 <fieldset class="Clientes">
		 	<legend>Datos De Los Clientes</legend>
			<p>	

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="RFC">RFC</label>: 
			
			<input type="text" id ="RFC" name="RFC" size = "27" maxlength = "25" required/></br>
					</br>
			</p>	


		 	<p>

		 	<center>	
		    
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Nombre">Nombre</label>: 
			
			<input type="text" id ="Nombre" name="Nombre" size = "22" maxlength = "20" required/>

		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="apellidoP">Apellido Paterno 
			<input type="text" id ="apellidoP" name="apellidoP" size = "22" maxlength = "20" required/>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="apellidoM">Apellido Materno 
			<input type="text" id ="apellidoM" name="apellidoM" size = "22" maxlength = "20" required/>
			</p></center>

			</br>
			<p>
			<center>
			<label for ="Direccion">Direccion</label>:
			
			<input type="street-address" id ="Direccion" name="Direccion" size = "32" maxlength = "30" required/>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Colonia">Colonia</label>:
			
			<input type="text" id ="Colonia" name="Colonia" size = "27" maxlength = "25" required/>
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			<label for ="CP">CP</label>:
			
			<input type="postal-code" id ="CP" name="CP" size = "10" maxlength = "10" required/>
			

			
			</p></center>
 			</br>

			<p>
			<center>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="TelefonoP">Telefono Personal</label>:
			
			<input type="tel" id ="TelefonoP" name="TelefonoP" size = "10" maxlength = "10" required/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="TelefonoF">Telefono Fijo</label>:
			<input type="tel" id ="TelefonoF" name="TelefonoF" size = "10" maxlength = "10" required/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<label for ="Correo">Correo</label>:
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<input type="email" id ="Correo" name="Correo" size = "37" maxlength = "35" required/>

			
			</center>
			</p>
			<br><br>
				<div class = "boton">
					<input type="submit" value="Agregar" ></code>	
				</div> 	

		 </fieldset>				
	</form>
 </section>   