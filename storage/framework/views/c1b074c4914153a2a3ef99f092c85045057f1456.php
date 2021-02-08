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
                <div class="logo-block" style="background-image: url(<?php echo e($logo); ?>)"></div>
            </td>
        </tr>
        <tr>
            <td class="column">
                <div class="image-block">
                    <img src="https://collierstech.ru/uploads/1553329320.jpg" class="picture">
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="columns">
                    <div class="image-block">
                        <img src="<?php echo e($item->img); ?>" class="picture">
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
                        <h2 style="padding: 5px;"><?php echo e($loop->iteration); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Здание</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->house); ?></h2>
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
                        <h2 class="cell-text"><?php echo e($item->address); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Расположение</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->location); ?></h2>
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
                        <h2 class="cell-text"><?php echo e($item->metro); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">КЛАСС ЗДАНИЯ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->house_class); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">Описание здания</h2>
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
                    <h2 class="cell-text">ДАТА ВВОДА В ЭКСПЛУАТАЦИЮ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->date_of_entery); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">АРЕНДОДАТЕЛЬ / ДЕВЕЛОПЕР</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->lessor); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ПЕШАЯ ДОСТУПНОСТЬ ОТ МЕТРО</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->walking_to_metro); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ОБЩАЯ АРЕНДУЕМАЯ ПЛОЩАДЬ ЗДАНИЯ, М<sup><small>2</small></sup></h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->house_area); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">СВОБОДНАЯ ПЛОЩАДЬ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->aviable_space); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ПАРКОВКА</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->parking); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">УПРАВЛЯЮЩАЯ КОМПАНИЯ</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->managment_company); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">АРЕНДНАЯ СТАВКА/ М<sup><small>2</small></sup> / ГОД</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->rents); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">ОПЕРАЦИОННЫЕ РАСХОДЫ / М<sup><small>2</small></sup> / ГОД</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->operating_expireance); ?></h2>
                    </div>
                </td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
        <tr>
            <td class="row-cell column">
                <div class="row-title">
                    <h2 class="cell-text">КОЛЬЦЕВАЯ ЗОНА</h2>
                </div>
            </td>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td class="row-cell columns">
                    <div class="row-data">
                        <h2 class="cell-text"><?php echo e($item->ring_zone); ?></h2>
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
     <table>
        <tr>
           <td class="table-header" colspan="2">
                <div class="title-block">
                    <h2 class="title">Сравнительный конкурентный анализ</h2>
                </div>
                <div class="logo-block" style="background-image: url(<?php echo e($logo); ?>);"></div>
            </td>
        </tr>
        <tr>
            <td style="width:70%;">
                <img src="https://maps.googleapis.com/maps/api/staticmap?scale=2&amp;size=1280x1280&amp;markers=color:blue%7Clabel%3A1%7C55.805791%2C37.520339&amp;markers=color:blue%7Clabel%3A2%7C55.761818%2C37.617563&amp;markers=color:blue%7Clabel%3A3%7C55.780998%2C37.572154&amp;markers=color:blue%7Clabel%3A4%7C55.779808%2C37.570402&amp;markers=color:blue%7Clabel%3A5%7C55.747115%2C37.539078&amp;markers=color:blue%7Clabel%3A6%7C55.880101%2C37.433343&amp;markers=color:blue%7Clabel%3A7%7C55.7208152%2C37.6007115&amp;key=AIzaSyDMYrZZhMGlK5PKOMQRQMVffXnUJwgyatY" style="display:inline-block;width:100%;margin-right:50px;float:left;margin-top:2px">
            </td>
            <td style="width:20%;vertical-align:top;">
                <table style="float:left;margin:20px;">
                    <?php ($counter = 1); ?>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 30%">#<?php echo e($counter); ?></td>
                                <td style="width: 70%"><?php echo e($item->house); ?></td>
                            </tr>
                            <?php ($counter++); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prema\resources\views/exports/templates/test.blade.php ENDPATH**/ ?>