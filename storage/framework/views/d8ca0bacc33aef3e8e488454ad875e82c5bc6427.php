<?php echo $__env->make('Menus.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link rel = "stylesheet" href = "<?php echo e(asset('css/reporteTabla.css')); ?>"/>
<link rel = "stylesheet" href = "<?php echo e(asset('css/botones.css')); ?>">
<link rel = "stylesheet" href = "<?php echo e(asset('css/paginacion.css')); ?>">
<section class="contenido">
    <title>Reporte Mantenimiento General</title>
    <h3 align="center">Mantenimieto General</h3>
    <button class="boton" onclick="location.href='<?php echo e(url('/Reportes/Mantenimiento/General/pdf')); ?>'">Generar PDF</button>

    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID Mantenimiento</th>
                <th>ID Impresora</th>
                <th>Modelo</th>
                <th>Descripcion</th>
                <th>Fecha de mantenimiento</th>
                <th>Fecha de finalizado</th>
                <th>Empleado</th>
                <th>Estado</th>
            </tr>
            <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($reporte->id_Mantenimiento); ?></td>
                <td><?php echo e($reporte->id_impresora); ?></td>
                <td><?php echo e($reporte->modelo); ?></td>
                <td><?php echo e($reporte->descripcion); ?></td>
                <td><?php echo e($reporte->fechaMan); ?></td>
                <td><?php echo e($reporte->fecha); ?></td>
                <td><?php echo e($reporte->nombreC); ?></td>
                <?php if($reporte->fecha != null): ?>
                    <td>Finalizado</td>
                    <?php else: ?>
                    <td>Pendiente</td>
                <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <?php echo e($reportes->links('paginacion.paginacion')); ?>

    <br>
    <br>
    <br>
   
</section>