<?php $__env->startSection('title', __('Parsing Offers By Feeds')); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="<?php echo e(route('home')); ?>">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> <?php echo e(__('Parsing Offers By Feeds')); ?>

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
                    <div class="my-4">
                        <h6 class="font-weight-bold">Currentrly we have the next active feeds</h5>
                         <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Long Feed:</b>
                                <?php if(! empty($feed->long)): ?>
                                    <?php echo e($feed->long); ?>

                                <?php else: ?>
                                    Not defined yet.
                                    <a class="col-2 text-md-center" href="<?php echo e(route('feeds.index', $teamId)); ?>">Add New</a>
                                <?php endif; ?>
                                <?php if(! empty($feed->long) and ! empty($feed->long_end)): ?>
                                    <span class="p-2 badge badge-dark badge-pill">Last usage: <?php echo e($feed->long_end); ?></span>
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>Short Feed:</b>
                                <?php if(! empty($feed->short)): ?>
                                    <?php echo e($feed->short); ?>

                                <?php else: ?>
                                    Not defined yet.
                                    <a class="col-2 text-md-center" href="<?php echo e(route('feeds.index', $teamId)); ?>">Add New</a>
                                <?php endif; ?>
                                <?php if(! empty($feed->short) and ! empty($feed->short_end)): ?>
                                    <span class="p-2 badge badge-dark badge-pill">Last usage: <?php echo e($feed->short_end); ?></span>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                    <form method="POST" action="<?php echo e(route('parser.parse', $teamId)); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="feed_type" value="__short">
                        <label class="d-block my-3" for="parseFeedBtn">Using the current short feed you may refresh the offers data.</label>
                        <button type="submit" class="btn btn-primary" id="parseFeedBtn"><?php echo e(__('Refresh My Offers')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sites/prema/resources/views/parser-index.blade.php ENDPATH**/ ?>