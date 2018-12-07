<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="<?php echo e(asset('logo.ico')); ?>">
	<link rel = "stylesheet" href = "<?php echo e(asset('css/estilos.css')); ?>"/>
	<link rel = "stylesheet" href = "<?php echo e(asset('css/fonts.css')); ?>"/> 
	<script src="<?php echo e(asset('js/jquery-3.3.1.js')); ?>"></script>
	<script src="<?php echo e(asset('js/menu.js')); ?>"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<header>
		<div id="perfil"><img id="empresa" src="<?php echo e(asset('logo.png')); ?>">
			<ul>
				<li><span class="icon-account_circle"></span></li>
			</ul>
			<br><b><?php echo e(Auth::user()->name); ?></b>	
		</div>

		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span> <span class="icon-close" style="display: none"></span>Menu</a>
			
		</div>
 
		<nav>
			<ul class="menu">
				<li><a href="<?php echo e(url('/home')); ?>"><span class="icon-home3"></span>Inicio</a></li>
				
				<li id="man" class="submenu"><a href="#"><span class="icon-arrow-circle-o-up"></span>Altas <span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href="<?php echo e(url('/Altas/Impresoras')); ?>"><span class="icon-printer"></span>Impresoras</a></li>
								<li><a href="<?php echo e(url('/Altas/Consumibles')); ?>"><span class="icon-droplet"></span>Consumibles</a></li>
								<li id="cal"><a href="<?php echo e(url('/Altas/Usuarios')); ?>"><span class="icon-group"></span>Usuarios</a></li>
								<li id="cal"><a href="<?php echo e(url('/Altas/Clientes')); ?>"><span class="icon-user-tie"></span>Clientes</a></li>
								<li id="cal"><a href="<?php echo e(url('/Altas/Proveedores')); ?>"><span class="icon-truck"></span>Provedores</a></li>
								<li id="cal"><a href="<?php echo e(url('/Altas/Empleados')); ?>"><span class="icon-group"></span>Empleados</a></li>
								<li><a href="<?php echo e(url('/Altas/Compatibilidad')); ?>"><span class="icon-arrow-shuffle"></span>Compatibilidad</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-arrow-circle-o-down"></span>Bajas/Modi <span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href="<?php echo e(url('/BajaMod/Impresoras')); ?>"><span class="icon-printer"></span>Impresoras</a></li>
								<li><a href="<?php echo e(url('/BajaMod/Consumibles')); ?>"><span class="icon-droplet"></span>Consumibles</a></li>
								<li id="cal"><a href="<?php echo e(url('/BajaMod/Usuarios')); ?>"><span class="icon-group"></span>Usuarios</a></li>
								<li id="cal"><a href="<?php echo e(url('/BajaMod/Clientes')); ?>"><span class="icon-user-tie"></span>Clientes</a></li>
								<li id="cal"><a href="<?php echo e(url('/BajaMod/Provedores')); ?>"><span class="icon-truck"></span>Provedores</a></li>
								<li id="cal"><a href="<?php echo e(url('/BajaMod/Empleados')); ?>"><span class="icon-group"></span>Empleados</a></li>
								<li id="cal"><a href="<?php echo e(url('/BajaMod/Compatibilidad')); ?>"><span class="icon-arrow-shuffle"></span>Compatibilidad</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-search-plus"></span>Búsquedas<span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li><a href="<?php echo e(url('/Busqueda/Avanzada/Consumibles')); ?>"><span class="icon-droplet"></span>Consumibles</a></li>
								<li id="pro"><a href="<?php echo e(url('/Busqueda/Avanzada/Impresoras')); ?>"><span class="icon-printer"></span>Impresoras</a></li>
								<li id="cal"><a href="<?php echo e(url('/Busqueda/Avanzada/Clientes')); ?>"><span class="icon-user-tie"></span>Clientes</a></li>
								<li><a href="<?php echo e(url('/Busqueda/Avanzada/Compatibilidad')); ?>"><span class="icon-arrow-shuffle"></span>Compatibilidad</a></li>
								<li id="cal"><a href="<?php echo e(url('/Busqueda/Avanzada/Provedores')); ?>"><span class="icon-truck"></span>Provedores</a></li>
								<li id="cal"><a href="<?php echo e(url('/Busqueda/Avanzada/Empleados')); ?>"><span class="icon-group"></span>Empleados</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-file-text-o"></span>Reportes<span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href=""><span class="icon-banknote"></span>Ventas</a></li>
								<li><a href="<?php echo e(url('/Reportes/reporteMantenimiento')); ?>"><span class="icon-wrench"></span>Mantenimiento</a></li>
								<li id="cal"><a href=""><span class="icon-cart"></span>Compras</a></li>
								<li id="cal"><a href="<?php echo e(url('/Reportes/reporteInventario')); ?>"><span class="icon-clipboard"></span>Inventario</a></li>
							</ul>
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-person_pin_circle"></span>Sucursal <span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li id="pro"><a href="<?php echo e(url('/Altas/Sucursal')); ?>"><span class="icon-arrow-circle-o-up"></span>Alta</a></li>
								<li><a href=""><span class="icon-person_pin_circle"></span>Administrar sucursal</a></li>
							</ul>
				</li>
				<li id="arc" class="submenu"><a href="#"><span class="icon-folder"></span>Archivo<span class="icon-dots-three-horizontal"></a>
							<ul class="item">
								<li><a href=""><span class="icon-question-circle"></span>Ayuda</a></li>
								<li id="out"><a href="<?php echo e(url('logout')); ?>"><span class="icon-log-out"></span>Cerrar Sesión</a></li>
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