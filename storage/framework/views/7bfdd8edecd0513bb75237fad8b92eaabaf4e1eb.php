


<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header font-weight-bold">
                        <?php echo e(__('Welcome!')); ?><big>&nbsp;</big>
                    </div>
                    <div class="card-body">
                        <h6 class="font-weight-bold"><a href="<?php echo e(url('/home')); ?>">Go to Dashboard</a></h6>
                        <hr style="height:0; border-top:2px solid #f2f2f2">
                        <h6 class="mt-4 font-weight-bold">Downloads:</h6>
                        <ul class="navbar-nav ml-auto font-weight-bold">
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-v0.1.xml')); ?>">property-feed-v0.1.xml</a>
                            </li>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-description-v0.1.txt')); ?>">property-feed-description-v0.1.txt</a>
                            </li>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-v0.2.xml')); ?>">property-feed-v0.2.xml</a>
                            </li>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-description-v0.2.txt')); ?>">property-feed-description-v0.2.txt</a>
                            </li>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-v1.1.xml')); ?>">property-feed-v1.1.xml</a>
                            </li>
                            <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-description-v1.1.txt')); ?>">property-feed-description-v1.1.txt</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Laravel v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (PHP v<?php echo e(PHP_VERSION); ?>)
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/custom/welcome.blade.php ENDPATH**/ ?>