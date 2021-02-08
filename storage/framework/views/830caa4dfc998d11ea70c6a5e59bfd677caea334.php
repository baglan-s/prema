


<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('team.update', $team->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="teamName">Name</label>
                    <input type="text" id="teamName" name="name" class="form-control" value="<?php echo e($team->name ?? ''); ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="teamStatus">Status</label>
                    <select name="status" id="teamStatus" class="form-control">
                        <option value="0" <?php if($team->status == 0): ?> selected <?php endif; ?>>Inactive</option>
                        <option value="1" <?php if($team->status == 1): ?> selected <?php endif; ?>>Active</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="teamDesc">Description</label>
                    <textarea name="description" id="teamDesc" cols="30" rows="5" class="form-control"><?php echo e($team->description); ?></textarea>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Choose the user for this team</div>
            <div class="card-body">
                <div class="form-row">
                    <?php if($users->count()): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->iteration == 1 || $loop->iteration%5 == 0): ?>
                                <div class="col-md-4">
                                    <?php endif; ?>
                                    <?php if($team->users->count() && in_array($user->id, $team->users()->pluck('id')->toArray())): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" checked name="user_ids[]" type="checkbox" id="teamUser<?php echo e($loop->iteration); ?>" value="<?php echo e($user->id); ?>">
                                            <label class="form-check-label" for="teamUser<?php echo e($loop->iteration); ?>"><?php echo e($user->name); ?></label>
                                        </div>
                                    <?php else: ?>
                                        <div class="form-check">
                                            <input class="form-check-input" name="user_ids[]" type="checkbox" id="teamUser<?php echo e($loop->iteration); ?>" value="<?php echo e($user->id); ?>">
                                            <label class="form-check-label" for="teamUser<?php echo e($loop->iteration); ?>"><?php echo e($user->name); ?></label>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($loop->last || $loop->iteration%5 == 0): ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-sm-12">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success mr-2" type="submit">Save</button>
                    <a href="<?php echo e(route('team.index')); ?>" class="btn btn-danger">Cancel</a>
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/admin/team/edit.blade.php ENDPATH**/ ?>