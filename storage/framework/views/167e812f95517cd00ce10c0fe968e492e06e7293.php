<div class="row gallery-row">
    <?php if(count($templates)): ?>
        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
              class="col-xl-6 gallery-item js-gallery-item"
              data-action="<?php echo e(route('exports.current', $team_id)); ?>"
              style="background-image: url('<?php echo e(url('exports/images/'.$value)); ?>');"
            >
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div><?php /**PATH /var/www/sites/prema/resources/views/components/exports/template-list.blade.php ENDPATH**/ ?>