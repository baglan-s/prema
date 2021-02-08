<html>
<head>
    <meta charset="utf-8">
    <link media="screen" rel="stylesheet" href="<?php echo e(url('exports/templates/css/main-01.css?v=').time()); ?>">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <table>
        <tr>
           <td class="table-header" colspan="6">
                <div class="title-block">
                    <h2 class="title">Сравнительный конкурентный анализ</h2>
                </div>
                <div class="logo-block" style="background-image: url(<?php echo e(url($logo)); ?>)"></div>
            </td>
        </tr>
        <tr>
            <td class="column">
                <div class="image-block">
                    <img src="<?php echo e(url('exports/images/offers/cover.jpg')); ?>" class="picture">
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="columns">
                    <div class="image-block">
                        <img src="<?php echo e(url('exports/images/offers/'.$item->images[0])); ?>" class="picture">
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="column">
                <div class="head-item">
                    <h2 style="padding: 5px; text-align: center;">Номер объекта</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="columns">
                    <div class="head-item">
                        <h2 style="padding: 5px;"><?php echo e($item->internal_id); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Название</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->name); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Город</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->location['city']); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Адрес</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->location['address']); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Станция метро</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text">
                            <?php if($metro = $item->location['metro']): ?>
                                <?php $__currentLoopData = $metro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $loop->last ? $name.'' : $name.'<br>'; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ОБЩАЯ ПЛОЩАДЬ, М<sup><small>2</small></sup></h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->area); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">СВОБОДНАЯ ПЛОЩАДЬ, М<sup><small>2</small></sup></h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->area_free); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">СТОИМОСТЬ АРЕНДЫ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text">
                            <?php
                                $price = "price_{$item->status}";
                                $fmt = ($item->price_unit == 'USD') ? 'en_US' : 'ru_RU';
                                $fprice = new NumberFormatter($fmt, NumberFormatter::CURRENCY);
                            ?>
                            <?php echo e($fprice->formatCurrency($item->{$price}, $item->price_unit)); ?>

                            <?php echo ($item->status == 'rent') ? " мес." : ''; ?>

                        </h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Описание</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->description); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ТИП ЗДАНИЯ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->building['type']); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ЭТАЖНОСТЬ ЗДАНИЯ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->building['storeys']); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">НАЛИЧИЕ ЛИФТА</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e(($item->building['lift'] == 'yes') ? 'ДА' : 'НЕТ'); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ДОПОЛНИТЕЛНЫЕ ОСОБЕННОСТИ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->features['car-place'] == 'parking' ? 'АВТОПАРКОВКА' : ''); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">КОЛИЧЕСТВО ЮНИТОВ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->propertys_count); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if($rest = (5 - $items->count())): ?>
                <?php for($i = 0; $i < $rest; $i++): ?>
                    <td class="columns"></td>
                <?php endfor; ?>
            <?php endif; ?>
        </tr>
    </table>
    <p class="page-break"></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH /var/www/sites/prema/resources/views/exports/templates/current.blade.php ENDPATH**/ ?>