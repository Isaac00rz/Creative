<?php echo $__env->make('Menus.usuario', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<link rel = "stylesheet" href = "<?php echo e(asset('css/reporteTabla.css')); ?>"/>
<link rel = "stylesheet" href = "<?php echo e(asset('css/paginacion.css')); ?>">
<style>#paginas{
margin-left: 0%;
}</style>
<title>Home</title>
<section class="contenido">
    <h3 align="center">Mantenimietos Pendientes</h3>
    <div id="tabla">
        <table cellspacing="0">
            <tr>
                <th>ID Mantenimiento</th>
                <th>ID Impresora</th>
                <th>Modelo</th>
                <th>Descripción</th>
                <th>Fecha de mantenimiento</th>
                <th>Estado</th>
            </tr>
            <?php $__currentLoopData = $reportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($reporte->id_Mantenimiento); ?></td>
                <td><?php echo e($reporte->id_impresora); ?></td>
                <td><?php echo e($reporte->modelo); ?></td>
                <td><?php echo e($reporte->descripcion); ?></td>
                <td><?php echo e($reporte->fechaMan); ?></td>
                <td>Pendiente</td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <?php echo e($reportes->links('paginacion.paginacion')); ?>

</section>
</body>
</html>