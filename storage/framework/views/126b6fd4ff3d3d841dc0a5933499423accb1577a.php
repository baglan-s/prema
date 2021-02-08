<?php $__env->startSection('title', __('Feed Managements')); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="<?php echo e(route('home')); ?>">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> <?php echo e(__('Feed Managements')); ?>

                </div>
                <div class="card-body">
                    <?php if($status = session('status')): ?>
                         <?php if (isset($component)) { $__componentOriginal46b14b59247c9c8da75789728a265922ff531aab = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Common\FlashMessage::class, ['status' => $status]); ?>
<?php $component->withName('common.flash-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal46b14b59247c9c8da75789728a265922ff531aab)): ?>
<?php $component = $__componentOriginal46b14b59247c9c8da75789728a265922ff531aab; ?>
<?php unset($__componentOriginal46b14b59247c9c8da75789728a265922ff531aab); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('feeds.save', $teamId)); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($feed->id ?? null); ?>">
                        <div class="form-group">
                            <label for="longUrl"><?php echo e(__('Long URL')); ?></label>
                            <input type="text" name="long" value="<?php echo e($feed->long ?? ''); ?>" class="form-control" id="longUrl" aria-describedby="longUrlHelp">
                            <small id="longUrlHelp" class="form-text text-muted"><?php echo e(__('Enter the feed url to load the list of all objects')); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="shortUrl"><?php echo e(__('Short URL')); ?></label>
                            <input type="text" name="short" value="<?php echo e($feed->short ?? ''); ?>" class="form-control" id="shortUrl" aria-describedby="shortUrlHelp">
                            <small id="shortUrlHelp" class="form-text text-muted"><?php echo e(__('Enter the feed url to load the list of 100 or less objects')); ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Save My Feeds')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sites/prema/resources/views/feeds-index.blade.php ENDPATH**/ ?>