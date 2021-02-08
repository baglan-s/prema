<?php $__env->startSection('title', __('Offers Lists')); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">
                    <a href="<?php echo e(route('home')); ?>">Dashboard</a> <big>&nbsp;&rsaquo;&nbsp;</big> Offers Lists
                </div>
                <div class="card-body">
                    <div class="mt-2 mb-4 table-container">
                        <h6 class="mb-4 font-weight-bold font-italic text-muted">
                            Offers by "<?php echo e($team->name); ?>"
                            <span class="ml-2 py-1 px-2 badge badge-warning badge-pill">total: &nbsp;<?php echo e($total); ?></span>
                        </h6>
                        <?php if($count = count($offers)): ?>
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
                             <?php if (isset($component)) { $__componentOriginal82fb835fab50f49e0995a228026e240411233cc2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Filters\SearchFilter::class, ['teamId' => $team->id]); ?>
<?php $component->withName('filters.search-filter'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal82fb835fab50f49e0995a228026e240411233cc2)): ?>
<?php $component = $__componentOriginal82fb835fab50f49e0995a228026e240411233cc2; ?>
<?php unset($__componentOriginal82fb835fab50f49e0995a228026e240411233cc2); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                            <div class="p-0 mb-4 bg-primary exports-panel js-exports-panel <?php echo e($team->has_choise ? 'd-block' : 'd-none'); ?>">
                                <p class="py-2 mb-0">...</p>
                                <div class="container bg-secondary d-none templates-gallery js-templates-gallery" data-action="<?php echo e(route('exports.templates', $team->id)); ?>">...
                                </div>
                            </div>
                            <div class="overflow-auto">
                                <table class="table offers-table js-offers-table" data-action="<?php echo e(route('offers.select-offer')); ?>">
                                    <thead>
                                        <tr>
                                            <th scope="col">&#10004;</th>
                                            <th scope="col">Units</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Area</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Entire</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="js-offer-row" id="offer<?php echo e($item->id); ?>">
                                            <td>
                                                <input
                                                    type="checkbox"
                                                    class="js-offer-selector"
                                                    data-id="<?php echo e($item->id); ?>"
                                                    <?php echo e($item->selected ? 'checked' : ''); ?>

                                                >
                                            </td>
                                            <td class="property-count js-property-switcher">
                                                <span><span><?php echo e($item->propertys->count()); ?></span></span>
                                            </td>
                                            <td class="font-weight-bolder text-muted">
                                                <?php echo e($item->name); ?><br>
                                                <span class="undername"><?php echo e($item->internal_id); ?></span>
                                            </td>
                                            <td>
                                                <?php echo e($item->location['country']); ?>,
                                                <?php echo e($item->location['city']); ?>,
                                                <?php echo e($item->location['address']); ?>

                                                <?php if($metro = $item->location['metro']): ?>, <br><i>Metro:</i>
                                                    <?php $__currentLoopData = $metro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($loop->last ? $name.'' : $name.', '); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php echo e($item->area); ?>&nbsp;&#13217;
                                            </td>
                                            <td>
                                                <?php
                                                    $price = "price_{$item->status}";
                                                    $fmt = ($item->price_unit == 'USD') ? 'en_US' : 'ru_RU';
                                                    $fprice = new NumberFormatter($fmt, NumberFormatter::CURRENCY);
                                                ?>
                                                <?php echo e($fprice->formatCurrency($item->{$price}, $item->price_unit)); ?>

                                                <?php echo ($item->status == 'rent') ? "<br>per/{$item->price_period}" : ''; ?>

                                            </td>
                                            <td><?php echo e($item->rent_entire ? 'yes' : 'no'); ?></td>
                                        </tr>
                                        <tr id="propertysBlock<?php echo e($item->id); ?>" class="d-none">
                                            <td colspan="7">
                                                 <?php if (isset($component)) { $__componentOriginalde2e3f0c41dae5baa894ec8a367918c74a1728dd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\PropertyTable::class, ['collection' => $item->propertys,'offerId' => $item->id,'teamId' => $team->id]); ?>
<?php $component->withName('tables.property-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalde2e3f0c41dae5baa894ec8a367918c74a1728dd)): ?>
<?php $component = $__componentOriginalde2e3f0c41dae5baa894ec8a367918c74a1728dd; ?>
<?php unset($__componentOriginalde2e3f0c41dae5baa894ec8a367918c74a1728dd); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php if($paginate): ?>
                                    <?php echo e($offers->links()); ?>

                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <div class="card">
                                <div class="card-body">
                                    No offers found! You may not have registered a long feed...<br>
                                    To add a new feed follow this link:<br>
                                    <a class="nav-link" href="<?php echo e(route('feeds.index', $team->id)); ?>">Feeds management for team "<?php echo e($team->name); ?>"</a><br>
                                    Or use your short feed for fast parsing the offers:<br>
                                    <a class="nav-link" href="<?php echo e(route('parser.index', $team->id)); ?>">Parsing offers for team "<?php echo e($team->name); ?>"</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('block-styles'); ?>
    <style type="text/css">
        .btn.active.focus,
        .btn.active:focus,
        .btn.focus,
        .btn:active.focus,
        .btn:active:focus,
        .btn:focus {
            outline: none !important;
            box-shadow: none !important;
        }
        .btn.btn-primary {
            color: #545b62;
            background-color: #fff;
        }
        .btn.btn-primary.active {
            color: #fff;
            background-color: #545b62;
        }
        table.offers-table {
            border-bottom: 1px solid #DEE2E6;
        }
        table.offers-table,
        table tr td.property-count {
            border-left: 1px solid #DEE2E6;
            border-right: 1px solid #DEE2E6;
        }
        table tr td {
            vertical-align: middle !important;
        }
        table tr td.property-count {
            font-size: 1.1em;
            text-align: center;
            cursor: pointer;
        }
        table tr td.property-count span span{
            position: relative;
        }
        table tr td.property-count:hover span span{
            display: none;
        }
        table tr td.property-count:hover span:after {
            font-weight: bold;
            content: '\02630';
        }
        table tr td.property-count:hover {
            background-color: #f9f9f9;
        }
        table tr td span.undername {
            font-size: 0.65em !important;
        }
        table.bg-grey {
            background-color: #f8f8f8;
        }
        table {
            min-width: 768px;
        }
        .input-group-prepend {
            cursor: pointer;
        }
        .exports-panel {
            text-align: center;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
        }
        .templates-gallery {
            border-top: 4px solid #fff;
        }
        .gallery-row {
            padding: 15px 0 15px 0;
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
        }
        .gallery-item {
            flex: 0 0 auto;
            width: 341px;
            height: 384px;
            margin-left: 15px;
            background-size: cover;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="<?php echo e(url('js/offers-index.js?v=') . time()); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sites/prema/resources/views/offers-index.blade.php ENDPATH**/ ?>