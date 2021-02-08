<?php if(count($propertys)): ?>
    <table class="table bg-grey js-propertys-table" data-offer-id="<?php echo e($offerId); ?>" data-action="<?php echo e(route('offers.select-property')); ?>">
        <thead>
            <tr>
                <th scope="col">&#10004;</th>
                <th scope="col">№</th>
                <th scope="col">Internal</th>
                <th scope="col">Name</th>
                <th scope="col">Floor</th>
                <th scope="col">Status</th>
                <th scope="col">Area</th>
                <th scope="col">Price</th>
                <th scope="col">Current Tenant</th>
                <th scope="col">For Sale</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $propertys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td data-label="&#10004;">
                    <input
                        type="checkbox"
                        class="js-property-selector"
                        data-id="<?php echo e($item->id); ?>"
                        <?php echo e($item->selected ? 'checked' : ''); ?>

                    >
                </td>
                <td data-label="№"><?php echo e($loop->iteration); ?></td>
                <td data-label="Internal"><?php echo e($item->internal_id); ?></td>
                <td data-label="Name"><?php echo e($item->name); ?></td>
                <td data-label="Floor"><?php echo e($item->features['floor'] ?? ''); ?></td>
                <td data-label="Status"><?php echo e($item->status); ?></td>
                <td data-label="Area">
                    <?php echo e($item->area); ?>&nbsp;&#13217;
                </td>
                <td data-label="Price">
                    <?php
                        $price = "price_{$item->status}";
                        $fmt = ($item->price_unit == 'USD') ? 'en_US' : 'ru_RU';
                        $fprice = new NumberFormatter($fmt, NumberFormatter::CURRENCY);
                    ?>
                    <?php echo e($fprice->formatCurrency($item->{$price}, $item->price_unit)); ?>

                    <?php echo ($item->status == 'rent') ? "<br>per/{$item->price_period}" : ''; ?>

                </td>
                <td data-label="Current Tenant"><?php echo e($item->current_tenant); ?></td>
                <td data-label="For Sale"><?php echo e($item->for_sale ? 'yes' : 'no'); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php else: ?>
    <span class="text-danger">No propertys found...</span>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\prema\resources\views/components/tables/property-table.blade.php ENDPATH**/ ?>