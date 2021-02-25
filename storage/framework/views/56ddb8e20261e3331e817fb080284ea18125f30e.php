<div class="row gallery-row">
    <?php if(count($templates)): ?>
        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div
              class="col-xl-6 gallery-item js-gallery-item"



              data-action="<?php echo e(route('exports.export', [$template->name, $team_id])); ?>"

              style="background-image: url('<?php echo e(asset($template->image)); ?>');"
            >
                <span class="gallery-item-title"><?php echo e($template->template_name); ?></span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\prema\resources\views/components/exports/template-list.blade.php ENDPATH**/ ?>