


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
        <a href="<?php echo e(route('team.create')); ?>" class="btn btn-success">Add new team</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Users count</th>
            <th scope="col">Date created</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if($teams->count()): ?>
            <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                    <td><?php echo e($team->name); ?></td>
                    <td><?php echo e($team->users->count()); ?></td>
                    <td><?php echo e($team->created_at); ?></td>
                    <td>
                        <a href="<?php echo e(route('team.edit', $team->id)); ?>" class="btn btn-warning btn-sm mr-1">Edit</a>
                        <form action="<?php echo e(route('team.destroy', $team->id)); ?>" method="post" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">You don't have any teams yet!</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <?php if($teams->count()): ?>
        <?php echo e($teams->links()); ?>

    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/admin/team/index.blade.php ENDPATH**/ ?>