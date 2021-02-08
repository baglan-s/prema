<?php $__env->startSection('title', __('Team Managements')); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="<?php echo e(route('home')); ?>">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> Team Managements
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
                    <h5>Create New Team</h5>
                    <form method="POST" action="<?php echo e(route('teams.save')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="teamName">Team Name</label>
                            <input
                                type="text"
                                name="name"
                                value=""
                                class="form-control"
                                id="teamName"
                            >
                        </div>
                        <div class="form-group">
                            <label for="teamDescription">Team Description</label>
                            <textarea
                                class="form-control"
                                name="description"
                                id="teamDescription"
                                rows="3"
                            ></textarea>
                        <button type="submit" class="btn btn-primary mt-3">Save My Team</button>
                    </form>
                    <?php if(count($teams)): ?>
                        <hr>
                        <h5>Edit Exists Team</h5>
                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <form method="POST" action="<?php echo e(route('teams.save')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="team_id" value="<?php echo e($team->id); ?>">
                                <div class="form-group">
                                    <label for="teamName_<?php echo e($team->id); ?>">Team Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="<?php echo e($team->name ?? ''); ?>"
                                        class="form-control"
                                        id="teamName_<?php echo e($team->id ?? ''); ?>"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="teamDescription_<?php echo e($team->id); ?>">Team Description</label>
                                    <textarea
                                        class="form-control"
                                        name="description"
                                        id="teamDescription_<?php echo e($team->id); ?>"
                                        rows="3"
                                    ><?php echo e($team->description ?? ''); ?></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Save My Team</button>
                            </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sites/prema/resources/views/teams-index.blade.php ENDPATH**/ ?>