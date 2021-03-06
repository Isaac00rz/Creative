<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="<?php echo e(asset('logo.ico')); ?>">		
	<link rel = "stylesheet" href = "<?php echo e(asset('css/estilos.css')); ?>"/>
	<link rel = "stylesheet" href = "<?php echo e(asset('css/fonts.css')); ?>"/> 
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="<?php echo e(asset('js/jquery-3.3.1.js')); ?>"></script>
	<script src="<?php echo e(asset('js/menu.js')); ?>"></script>
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
				<li><a href=""><span class="icon-banknote"></span>Ventas</a></li>
				<li><a href=""><span class="icon-cart"></span>Compras</a></li>
				<li><a href=""><span class="icon-monetization_on"></span>Rentas</a></li>
				<li class="submenu"><a href="#"><span class="icon-search-plus"></span>Búsquedas<span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">
								<li><a href="<?php echo e(url('/Busqueda/Avanzada/Consumibles')); ?>"><span class="icon-droplet"></span>Consumibles</a></li>
								<li id="pro"><a href="<?php echo e(url('/Busqueda/Avanzada/Impresoras')); ?>"><span class="icon-printer"></span>Impresoras</a></li>
								<li id="cal"><a href="<?php echo e(url('/Busqueda/Avanzada/Clientes')); ?>"><span class="icon-user-tie"></span>Clientes</a></li>
								<li><a href="<?php echo e(url('/Busqueda/Avanzada/Compatibilidad')); ?>"><span class="icon-arrow-shuffle"></span>Compatibilidad</a></li>
								<li id="cal"><a href="<?php echo e(url('/Busqueda/Avanzada/Provedores')); ?>"><span class="icon-truck"></span>Provedores</a></li>
							</ul>
				
				</li>
				<li id="man" class="submenu"><a href="#"><span class="icon-wrench"></span>Mantenimiento <span class="icon-dots-three-horizontal"></span></a>
							<ul class="item">

								<li id="pro"><a href="<?php echo e(url('/Altas/mantenimiento')); ?>"><span class="icon-update"></span>Programación</a></li>
								<li id="pro"><a href="<?php echo e(url('/BajaMod/Mantenimiento')); ?>"><span class="icon-pencil"></span>Editar/Eliminar Programación</a></li>
								<li><a href="<?php echo e(url('/Altas/FinMantenimiento')); ?>"><span class="icon-file-text-o"></span>Reporte de finalizado</a></li>
								<li id="cal"><a href="<?php echo e(url('/Usuarios/Mantenimiento/Calendario')); ?>"><span class="icon-calendar"></span>Pendientes</a></li>
								<!-- <li id="pro"><a href="<?php echo e(url('/usuario/events')); ?>"><span class="icon-update"></span>Programación</a></li> -->
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