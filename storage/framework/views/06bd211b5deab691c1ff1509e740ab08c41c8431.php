<div id="paginas">
<ul class="pagination">
    <!-- Previous Page Link -->
    <?php if($paginator->onFirstPage()): ?>
        <li class="disabled"><span>&laquo;</span></li>
    <?php else: ?>
        <li class="otro"><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">&laquo;</a></li>
    <?php endif; ?>

    <!-- Pagination Elements -->
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- "Three Dots" Separator -->
        <?php if(is_string($element)): ?>
            <li class="disabled"><span><?php echo e($element); ?></span></li>
        <?php endif; ?>

        <!-- Array Of Links -->
        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $paginator->currentPage()): ?>
                    <li class="active"><span><?php echo e($page); ?></span></li>
                <?php else: ?>
                    <li class="otro"><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- Next Page Link -->
    <?php if($paginator->hasMorePages()): ?>
        <li class="otro"><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next">&raquo;</a></li>
    <?php else: ?>
        <li class="disabled"><span>&raquo;</span></li>
    <?php endif; ?>
</ul>
</div>