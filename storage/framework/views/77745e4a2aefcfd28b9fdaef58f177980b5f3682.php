<html>
<head>
<link rel = "stylesheet" href = "<?php echo e(asset('css/reporteTablaPDF.css')); ?>"/>
</head>
<img src="C:\xampp\htdocs\Creative\public\logo.png" height="150" width="250">

<div class="col-md-5" align="right">
<?php
$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
echo "Fecha: ";
echo $hora->format('Y-m-d');
?>
<br />
<?php
echo "Hora: ";
$hora2 = new DateTime("now", new DateTimeZone('America/Mexico_City'));
echo $hora2->format('H:i:s');
 ?>
</div>

    <title>Reporte Mantenimiento General</title>
    <h3 align="center">Mantenimieto General</h3>
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

</html>