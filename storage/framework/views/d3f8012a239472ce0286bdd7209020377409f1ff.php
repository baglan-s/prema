


<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <?php echo e(__('Dashboard')); ?><big>&nbsp;</big>
                    </div>
                    <div class="card-body">
                        <ul class="navbar-nav ml-auto font-weight-bold">
                            <?php if(isset($teams)): ?>
                                <h6 class="mt-4 font-weight-bold">Offers List</h6>
                                <?php if(count($teams)): ?>
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('offers.index', $team->id)); ?>">For your team "<?php echo e($team->name); ?>"</a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <small>You don't have any offer list...</small>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/custom/create-presentation.blade.php ENDPATH**/ ?>