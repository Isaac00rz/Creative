<?php echo $__env->make('Menus.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link rel = "stylesheet" href = "<?php echo e(asset('css/botones.css')); ?>">
<section class="contenido">
    <button class="boton" onclick="location.href='<?php echo e(url('/Reportes/Mantenimiento/General')); ?>'">Mantenimiento general</button>
    <button class="boton" onclick="location.href='<?php echo e(url('/Reportes/Mantenimiento/Pendientes')); ?>'">Mantenimientos pendientes</button>
    <button class="boton" onclick="location.href='<?php echo e(url('/Reportes/Mantenimiento/Finalizado')); ?>'">Mantenimientos finalizados</button>
</section>