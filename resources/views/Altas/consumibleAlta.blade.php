@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/formulario.css') }}"/>

<title>Alta Consumible</title>
<section class="contenido">
<form role="form" method="post" action="{{ url('/Altas/Consumibles/altaConsumible') }}">
		{!! csrf_field() !!}
		<fieldset>
			<legend>Datos Del Consumible</legend>
			<p>
				<label for ="nombre">Nombre</label>: <input type="text" name = "nombre" id = "nombre" size = "30" maxlength = "15" placeholder="Nombre del consumible" auto_focus required><br/>
				<label for ="descripcion">Descripción</label>: <input type="text" name = "descripcion" id = "descripcion"size = "30" maxlength = "250" placeholder=" Descripción"><br/>
				<label for ="existencias">Existencias</label>: <input type="number" name = "existencias" id = "existencias"size = "30" min="1" placeholder="Existencias" required><br/>
                <label for ="precio">Precio</label>: <input type="number" name = "precio" id = "precio"size = "30" min="1" placeholder="Precio" required><br/>
				<label for ="costo">Costo</label>: <input type="number" name = "costo" id = "costo"size = "30" min="1" placeholder="Costo" required><br/>
				<hr>
				<div class = "boton">
					<input type="submit" value="Agregar" ></code>	
				</div>
			</p>
		</fieldset>
	</form>
 </section>   