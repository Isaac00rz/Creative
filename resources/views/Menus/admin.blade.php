<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="{{ asset('logo.ico') }}">
	<link rel = "stylesheet" href = "{{ asset('css/estilos.css') }}"/>
	<link rel = "stylesheet" href = "{{ asset('css/fonts.css') }}"/> 
	<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
	<script src="{{ asset('js/menu.js') }}"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<header>
		<div id="perfil"><img id="empresa" src="{{ asset('logo.png') }}">
			<ul>
				<li><span class="icon-account_circle"></span></li>
			</ul>
			<br><b>{{ Auth::user()->name }}</b>	
		</div>

		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span> <span class="icon-close" style="display: none"></span>Menu</a>
			
		</div>
 
		<nav>
			<ul class="menu">
				<li><a href="{{ url('/admin') }}"><span class="icon-home3"></span>Inicio</a></li>
				
				<li id="man" class="submenu"><a href="#"><span class="icon-arrow-circle-o-up"></span>Altas <span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href="{{ url('/Altas/Impresoras') }}"><span class="icon-printer"></span>Impresoras</a></li>
								<li><a href="{{ url('/Altas/Consumibles') }}"><span class="icon-droplet"></span>Consumibles</a></li>
								<li id="cal"><a href="{{ url('/Altas/Usuarios') }}"><span class="icon-group"></span>Usuarios</a></li>
								<li id="cal"><a href="{{ url('/Altas/Clientes') }}"><span class="icon-user-tie"></span>Clientes</a></li>
								<li id="cal"><a href="{{ url('/Altas/Proveedores') }}"><span class="icon-truck"></span>Provedores</a></li>
								<li id="cal"><a href="{{ url('/Altas/Empleados') }}"><span class="icon-group"></span>Empleados</a></li>
								<li><a href="{{ url('/Altas/Compatibilidad') }}"><span class="icon-wrench"></span>Compatibilidad</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-arrow-circle-o-down"></span>Bajas/Modi <span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href="{{ url('/BajaMod/Impresoras') }}"><span class="icon-printer"></span>Impresoras</a></li>
								<li><a href="{{ url('/BajaMod/Consumibles') }}"><span class="icon-droplet"></span>Consumibles</a></li>
								<li id="cal"><a href="{{ url('/BajaMod/Usuarios') }}"><span class="icon-group"></span>Usuarios</a></li>
								<li id="cal"><a href="{{ url('/BajaMod/Clientes') }}"><span class="icon-user-tie"></span>Clientes</a></li>
								<li id="cal"><a href="{{ url('/BajaMod/Provedores') }}"><span class="icon-truck"></span>Provedores</a></li>
								<li id="cal"><a href="{{ url('/BajaMod/Empleados') }}"><span class="icon-group"></span>Empleados</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-arrow-circle-o-down"></span>Búsquedas<span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li><a href="{{ url('/Busqueda/Avanzada/Consumibles') }}"><span class="icon-droplet"></span>Consumibles</a></li>
								<li id="pro"><a href="{{ url('/Busqueda/Avanzada/Impresoras') }}"><span class="icon-printer"></span>Impresoras</a></li>
								<li id="cal"><a href="{{ url('/Busqueda/Avanzada/Clientes') }}"><span class="icon-user-tie"></span>Clientes</a></li>
								<li><a href="{{ url('/Busqueda/Avanzada/Compatibilidad') }}"><span class="icon-wrench"></span>Compatibilidad</a></li>
								<li id="cal"><a href="{{ url('/Busqueda/Avanzada/Provedores') }}"><span class="icon-truck"></span>Provedores</a></li>
								<li id="cal"><a href="{{ url('/Busqueda/Avanzada/Empleados') }}"><span class="icon-group"></span>Empleados</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-file-text-o"></span>Reportes<span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href=""><span class="icon-banknote"></span>Ventas</a></li>
								<li><a href="{{ url('/Reportes/reporteMantenimiento') }}"><span class="icon-wrench"></span>Mantenimiento</a></li>
								<li id="cal"><a href=""><span class="icon-cart"></span>Compras</a></li>
								<li id="cal"><a href="{{ url('/Reportes/reporteInventario') }}"><span class="icon-paste"></span>Inventario</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-mapmarker"></span>Sucursal <span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href="{{ url('/Altas/Sucursal') }}"><span class="icon-arrow-circle-o-up"></span>Alta</a></li>
								<li><a href=""><span class="icon-person_pin_circle"></span>Administrar sucursal</a></li>
							</ul>
				</li>
				<li id="arc" class="submenu"><a href="#"><span class="icon-folder"></span>Archivo<span class="icon-dots-three-horizontal"></a>
							<ul class="item">
								<li><a href=""><span class="icon-question-circle"></span>Ayuda</a></li>
								<li id="out"><a href="{{ url('logout') }}"><span class="icon-log-out"></span>Cerrar Sesión</a></li>
							</ul>
				</li>
			</ul>
		</nav>
	</header>
<!-- 	<script>
    var url = document.URL;
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, url);
    });
</script> -->