


<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(route('user.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userName">Name</label>
                    <input type="text" name="name" id="userName" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userEmail">E-mail</label>
                    <input type="email" name="email" id="userEmail" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userStatus">Status</label>
                    <select name="status" id="userStatus" class="form-control">
                        <option value="Active">Active</option>
                        <option value="Unconfirmed">Unconfirmed</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <?php if($roles->count()): ?>
                    <div class="form-group">
                        <label for="userRole">Role</label>
                        <select name="role_id" id="userRole" class="form-control">
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input type="password" name="password" id="userPassword" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="userConfirm">Password Confirm</label>
                    <input type="password" name="password_confirmation" id="userConfirm" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">Choose the team for this user</div>
            <div class="card-body">
                <div class="form-row">
                    <?php if($teams->count()): ?>
                        <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->iteration == 1 || $loop->iteration%6 == 0): ?>
                                <div class="col-md-4">
                                    <?php endif; ?>
                                    <div class="form-check">
                                        <input class="form-check-input" name="team_ids[]" type="checkbox" id="userTeam<?php echo e($loop->iteration); ?>" value="<?php echo e($team->id); ?>">
                                        <label class="form-check-label" for="userTeam<?php echo e($loop->iteration); ?>"><?php echo e($team->name); ?></label>
                                    </div>
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
                    <button class="btn btn-success mr-2" type="submit">Сохранить</button>
                    <a href="<?php echo e(route('user.index')); ?>" class="btn btn-danger">Отменить</a>
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/admin/user/create.blade.php ENDPATH**/ ?>