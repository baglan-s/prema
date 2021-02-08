


<?php $__env->startSection('content'); ?>

    <div class="container pt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <?php echo e(__('Dashboard')); ?><big>&nbsp;</big>
                    </div>
                    <div class="card-body">
                        <ul class="navbar-nav ml-auto font-weight-bold">
                            <h6 class="font-weight-bold">Exports Test</h6>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('exports.test')); ?>">Show HTML</a>
                            </li>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('exports.test', 'pdf')); ?>">Show PDF</a>
                            </li>
                            <?php if(auth()->user() && auth()->user()->isAdmin()): ?>
                                <h6 class="mt-4 font-weight-bold">Teams Management</h6>
                                <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                    <a class="nav-link pl-3" href="<?php echo e(route('teams.index')); ?>">Create or edit your Teams</a>
                                </li>
                            <?php endif; ?>
                            <?php if(isset($teams)): ?>
                                <h6 class="mt-4 font-weight-bold">Feeds Management</h6>
                                <?php if(count($teams)): ?>
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('feeds.index', $team->id)); ?>">For your team "<?php echo e($team->name); ?>"</a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <small>You don't have any company for feeds...</small>
                                <?php endif; ?>
                                <h6 class="mt-4 font-weight-bold">Parsing Offers by Feed</h6>
                                <?php if(count($teams)): ?>
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('parser.index', $team->id)); ?>">For your team "<?php echo e($team->name); ?>"</a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <small>You don't have any active feed...</small>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/custom/update-database.blade.php ENDPATH**/ ?>