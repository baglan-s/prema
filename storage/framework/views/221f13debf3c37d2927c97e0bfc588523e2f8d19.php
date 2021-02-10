<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="<?php echo e(url('exports/templates/css/definitions.css?v=').time()); ?>">
    <link media="screen" rel="stylesheet" href="<?php echo e(url('exports/templates/css/3.css?v=').time()); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body>


<div class="content">
    <?php $__env->startComponent('exports.components.3.header', ['logo' => $logo, 'params' => $params]); ?> <?php if (isset($__componentOriginal11ad768645ab401289ea40eba81a8b9e9cfb4e99)): ?>
<?php $component = $__componentOriginal11ad768645ab401289ea40eba81a8b9e9cfb4e99; ?>
<?php unset($__componentOriginal11ad768645ab401289ea40eba81a8b9e9cfb4e99); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <div class="inner-content width-80">
        <table class="info-table width-100">
            <thead>
                <tr>
                    <td></td>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <div class="image-block" style="background-image: url(<?php echo e(asset('exports/images/offers/' . $offer->images[0])); ?>)"></div>
                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr class="title-row">
                    <th>Номер объекта</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th>#<?php echo e($loop->iteration); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="cs-bg-white">Здание</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th class="<?php if($loop->iteration%2==0): ?> cs-bg-white <?php else: ?> cs-bg-1 <?php endif; ?>"><?php echo e($offer->name); ?></th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php if(isset($params['main']['address']) && !empty($params['main']['address'])): ?>
                    <tr>
                        <th class="cs-bg-white">Адрес</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="<?php if($loop->iteration%2==0): ?> cs-bg-white <?php else: ?> cs-bg-1 <?php endif; ?>"> <?php echo e($offer->location['city']); ?>, <?php echo e($offer->location['address']); ?></th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th class="cs-bg-white">Расположение</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="<?php if($loop->iteration%2==0): ?> cs-bg-white <?php else: ?> cs-bg-1 <?php endif; ?>"></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php if(isset($params['main']['metro'])): ?>
                    <tr>
                        <th class="cs-bg-white">Станция метро</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="<?php if($loop->iteration%2==0): ?> cs-bg-white <?php else: ?> cs-bg-1 <?php endif; ?>">
                                <?php if($metro = $offer->location['metro']): ?>
                                    <?php $__currentLoopData = $metro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $loop->last ? $name.'' : $name.', '; ?>

                                        <?php if($loop->iteration == 2): ?> <?php break; ?> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <?php if(isset($params['general']['building_type'])): ?>
                    <tr>
                        <th class="cs-bg-2">Класс здания</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="<?php if($loop->iteration%2==0): ?> cs-bg-white <?php else: ?> cs-bg-1 <?php endif; ?>"><?php echo e($offer->building['type']); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <?php if(isset($params['main']['description']) && !empty($params['main']['description'])): ?>
                    <tr>
                        <th class="cs-bg-2">Описание здания</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="<?php if($loop->iteration%2==0): ?> cs-bg-white <?php else: ?> cs-bg-1 <?php endif; ?>"><?php echo e($offer->description); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th class="cs-bg-2">Дата ввода в эксплуатацию</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="<?php if($loop->iteration%2==0): ?> cs-bg-3 <?php else: ?> cs-bg-2 <?php endif; ?>"><?php echo e(date('d-m-Y', strtotime($offer->created_at))); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <th class="cs-bg-2">Арендодатель / Девелопер</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="<?php if($loop->iteration%2==0): ?> cs-bg-3 <?php else: ?> cs-bg-2 <?php endif; ?>"><?php echo e($offer->team->name ?? ''); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <th class="cs-bg-2">Пешая доступность от метро</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="<?php if($loop->iteration%2==0): ?> cs-bg-3 <?php else: ?> cs-bg-2 <?php endif; ?>"></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php if(isset($params['general']['total_area'])): ?>
                    <tr>
                        <th class="cs-bg-2">Общая арендуемая площадь здания, м &sup2;</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="<?php if($loop->iteration%2==0): ?> cs-bg-3 <?php else: ?> cs-bg-2 <?php endif; ?>"><?php echo e($offer->area); ?> м²</td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <?php if(isset($params['general']['free_area'])): ?>
                    <tr>
                        <th class="cs-bg-2">Свободная площадь, м &sup2;</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="<?php if($loop->iteration%2==0): ?> cs-bg-3 <?php else: ?> cs-bg-2 <?php endif; ?>"><?php echo e($offer->area_free); ?> м²</td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <?php if(isset($params['general']['infrastructure'])): ?>
                    <tr>
                        <th class="cs-bg-2">Парковка</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="<?php if($loop->iteration%2==0): ?> cs-bg-3 <?php else: ?> cs-bg-2 <?php endif; ?>"><?php echo e($offer->features['car-place'] == 'parking' ? 'Есть' : ''); ?></td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th class="cs-bg-2">Управляющая компания</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="<?php if($loop->iteration%2==0): ?> cs-bg-3 <?php else: ?> cs-bg-2 <?php endif; ?>"></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php if(isset($params['commercial']['main_rent'])): ?>
                    <tr>
                        <th class="cs-bg-white">Арендная ставка</th>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td class="<?php if($loop->iteration%2==0): ?> cs-bg-1 <?php else: ?> cs-bg-white <?php endif; ?>">от <?php echo e($offer->propertys()->min('price_rent')); ?> руб. до <?php echo e($offer->propertys()->max('price_rent')); ?> руб.</td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th class="cs-bg-white">Операционные расходы/м &sup2;/ год</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="<?php if($loop->iteration%2==0): ?> cs-bg-1 <?php else: ?> cs-bg-white <?php endif; ?>"></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <th class="cs-bg-white">Кольцевая зона</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td class="<?php if($loop->iteration%2==0): ?> cs-bg-1 <?php else: ?> cs-bg-white <?php endif; ?>"></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </tbody>
        </table>
    </div>
    <?php $__env->startComponent('exports.components.3.footer'); ?> <?php if (isset($__componentOriginala6b4a432fc61d9a44fdf6599046c649f5fc739e2)): ?>
<?php $component = $__componentOriginala6b4a432fc61d9a44fdf6599046c649f5fc739e2; ?>
<?php unset($__componentOriginala6b4a432fc61d9a44fdf6599046c649f5fc739e2); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <p class="page-break"></p>

    <?php $__env->startComponent('exports.components.3.header'); ?> <?php if (isset($__componentOriginal11ad768645ab401289ea40eba81a8b9e9cfb4e99)): ?>
<?php $component = $__componentOriginal11ad768645ab401289ea40eba81a8b9e9cfb4e99; ?>
<?php unset($__componentOriginal11ad768645ab401289ea40eba81a8b9e9cfb4e99); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

        <?php
            $map_src = 'https://maps.googleapis.com/maps/api/staticmap?center=';
            $map_tools = [
                ['name' => 'B', 'color' => 'blue'],
                ['name' => 'S', 'color' => 'red'],
                ['name' => 'G', 'color' => 'green'],
                ['name' => 'C', 'color' => 'pink'],
            ];
        ?>
        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->iteration == 1): ?>
                <?php ($map_src .= $offer->location['lat'] . ',' . $offer->location['lon'] . '&zoom=9&size=800x600&markers=color:' . $map_tools[$loop->index]['color'] . '%7Clabel:' . $map_tools[$loop->index]['name'] . '%7C' . $offer->location['lat'] . ',' . $offer->location['lon']); ?>
            <?php else: ?>
                <?php ($map_src .= '&markers=color:' . $map_tools[$loop->index]['color'] . '%7Clabel:' . $map_tools[$loop->index]['name'] . '%7C' .  $offer->location['lat'] . ',' . $offer->location['lon'] . '&markers=color:blue%7Clabel:' . $map_tools[$loop->index]['name'] . '%7C'); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php ($map_src .= '&key=' . env('GOOGLE_MAPS_API_KEY')); ?>

    <div class="inner-content width-80">
        <div class="width-28 dinline-block p-r-20">
            <div class="objects-list">
                <div class="list-title">
                    <p>Объект</p>
                </div>
                <ul>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($offer->name); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="width-68 dinline-block">
            <div class="objects-map">
                <img src="<?php echo e($map_src); ?>" alt="">
            </div>
        </div>
    </div>

    <?php $__env->startComponent('exports.components.3.footer'); ?> <?php if (isset($__componentOriginala6b4a432fc61d9a44fdf6599046c649f5fc739e2)): ?>
<?php $component = $__componentOriginala6b4a432fc61d9a44fdf6599046c649f5fc739e2; ?>
<?php unset($__componentOriginala6b4a432fc61d9a44fdf6599046c649f5fc739e2); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <p class="page-break"></p>

</div>
<p class="page-break"></p>






</body>
</html>
<?php /**PATH C:\xampp\htdocs\prema\resources\views/exports/templates/3.blade.php ENDPATH**/ ?>