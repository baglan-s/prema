


<?php $__env->startSection('content'); ?>
    <?php if(session()->has('msg_success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session()->get('msg_success')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if(session()->has('msg_error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e(session()->get('msg_error')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="table-actions d-flex justify-content-end mb-2">
        <a href="<?php echo e(route('user.create')); ?>" class="btn btn-success">Add new user</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Teams count</th>
            <th scope="col">Role</th>
            <th scope="col">Date created</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if($users->count()): ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->teams->count()); ?></td>
                    <td><?php echo e($user->role->name ?? ''); ?></td>
                    <td><?php echo e($user->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('user.edit', $user->id)); ?>" class="btn btn-warning btn-sm mr-1">Изменить</a>
                        <form action="<?php echo e(route('user.destroy', $user->id)); ?>" method="post" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">You don't have any users yet!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php if($users->count()): ?>
        <?php echo e($users->links()); ?>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/admin/user/index.blade.php ENDPATH**/ ?>