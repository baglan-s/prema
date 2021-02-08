

<?php $__env->startSection('content'); ?>

    <section class="home-block full-height">
        <div class="container">
            <div class="row choices d-flex justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="<?php echo e(route('update-database')); ?>" class="update-action d-flex align-items-center justify-content-center">
                        Update DataBase
                        <span class="last-update">last update <br> 05.02.2021</span>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <a href="<?php echo e(route('create-presentation')); ?>" class="create-action d-flex align-items-center justify-content-center">
                        Create Presentation
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="<?php echo e(route('new-presentation')); ?>" class="new-action d-flex align-items-center justify-content-center">
                        I want the new presentation
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.custom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/custom/home.blade.php ENDPATH**/ ?>