@include('Menus.admin')
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
<section class="contenido">
    <button class="boton" onclick="location.href='{{ url('/Reportes/Mantenimiento/General') }}'">Mantenimiento general</button>
    <button class="boton" onclick="location.href='{{ url('/Reportes/Mantenimiento/Pendientes') }}'">Mantenimientos pendientes</button>
    <button class="boton" onclick="location.href='{{ url('/Reportes/Mantenimiento/Finalizado') }}'">Mantenimientos finalizados</button>
</section>