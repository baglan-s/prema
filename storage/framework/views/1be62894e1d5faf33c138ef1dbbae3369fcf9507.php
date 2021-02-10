<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="<?php echo e(url('exports/templates/css/definitions.css?v=').time()); ?>">
    <link media="screen" rel="stylesheet" href="<?php echo e(url('exports/templates/css/4.css?v=').time()); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body class="landscape">


<div class="content">
    <?php $__env->startComponent('exports.components.4.header', ['logo' => $logo, 'params' => $params]); ?> <?php if (isset($__componentOriginal34ed8b4fdae933121eaf61d3207bf5a89b40982b)): ?>
<?php $component = $__componentOriginal34ed8b4fdae933121eaf61d3207bf5a89b40982b; ?>
<?php unset($__componentOriginal34ed8b4fdae933121eaf61d3207bf5a89b40982b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <div class="inner-content width-100">
        <table class="info-table width-100">
            <thead>
                <tr class="images-row">
                    <td></td>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <div class="image-block" style="background-image: url(<?php echo e(asset('exports/images/offers/' . $offer->images[0])); ?>)"></div>
                        </td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr class="title-row">
                    <td></td>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th>
                            <span><?php echo e($offer->name); ?></span>
                        </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <?php if(isset($params['main']['address']) && !empty($params['main']['address'])): ?>
                    <tr class="address-row">
                        <td></td>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th>
                                <?php echo e($offer->location['city']); ?>, <?php echo e($offer->location['address']); ?> <br>
                                САО <br>
                                <?php if(isset($params['main']['metro']) && $metro = $offer->location['metro']): ?>
                                    <?php $__currentLoopData = $metro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $loop->last ? $name.'' : $name.', '; ?>

                                        <?php if($loop->iteration == 2): ?> <?php break; ?> <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                 <br>
                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endif; ?>
            </thead>
            <tbody>
            <?php if(isset($params['general']['building_type'])): ?>
                <tr>
                    <th>Класс здания</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($offer->building['type']); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endif; ?>
            <?php if(isset($params['main']['description']) && !empty($params['main']['description'])): ?>
                <tr>
                    <th>Описание здания</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($offer->description); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endif; ?>
                <tr>
                    <th>Дата ввода в эксплуатацию</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td ><?php echo e(date('d-m-Y', strtotime($offer->created_at))); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <th>Арендодатель / Девелопер</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($offer->team->name ?? ''); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
                <tr>
                    <th>Пешая доступность от метро</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php if(isset($params['general']['total_area'])): ?>
                <tr>
                    <th>Общая арендуемая площадь здания, м &sup2;</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($offer->area); ?> м²</td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endif; ?>
            <?php if(isset($params['general']['free_area'])): ?>
                <tr>
                    <th>Свободная площадь, м &sup2;</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($offer->area_free); ?> м²</td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endif; ?>
            <?php if(isset($params['general']['infrastructure'])): ?>
                <tr>
                    <th>Парковка</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($offer->features['car-place'] == 'parking' ? 'Есть' : ''); ?></td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endif; ?>
                <tr>
                    <th>Управляющая компания</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php if(isset($params['commercial']['main_rent'])): ?>
                <tr class="cs-bg-last">
                    <th >Арендная ставка</th>
                    <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>от <?php echo e($offer->propertys()->min('price_rent')); ?> руб. до <?php echo e($offer->propertys()->max('price_rent')); ?> руб.</td>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            <?php endif; ?>

                <tr class="cs-bg-last">
                    <th>Операционные расходы/м &sup2;/ год</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="cs-bg-last">
                    <th></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="page-break"></p>


<div class="test width-100">
    <div class="width-80 dinline-block">
        <div class="header-title-block <?php echo e($class ?? ''); ?>">
            <div class="header-text">
                <div class="header-title">
                    <p>Сравнительный конкурентный анализ</p>
                </div>
                <div class="header-add-info">
                    <span class="address">123456, Moscow, Pravdy st, bld 15</span>
                    <span class="website">www.ourrealestate.com</span>
                </div>
            </div>
        </div>
    </div>
    <div class="width-19 dinline-block p-20">
        <div class="main-logo image-block">
            logo
        </div>
    </div>
</div>

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

        <div class="inner-content">
        <div class="location">
            <div class="width-20 dinline-block p-r-20">
                <div class="objects-list">
                    <ul>
                        <?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($offer->name); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="width-75 dinline-block">
                <div class="objects-map" style="background-image: url(<?php echo e($map_src); ?>);">

                </div>
            </div>
        </div>
        </div>



</div>

<p class="page-break"></p>






</body>
</html>
<?php /**PATH C:\xampp\htdocs\prema\resources\views/exports/templates/4.blade.php ENDPATH**/ ?>