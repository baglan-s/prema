<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link media="screen" rel="stylesheet" href="<?php echo e(url('exports/templates/css/second.css?v=').time()); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .page-break { page-break-after: always; }
    </style>
</head>
<body>


<?php $__currentLoopData = $data[0]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="content">
        <?php $__env->startComponent('exports.components.2.header', ['offer' => $offer, 'logo' => $logo, 'params' => $params]); ?> <?php if (isset($__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35)): ?>
<?php $component = $__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35; ?>
<?php unset($__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
        <div class="main-content">
            <div class="main-images width-100">
                <div class="image-block width-40 dinline-block m-r-25" style="background-image: url(<?php echo e(asset('exports/images/offers/cover.jpg')); ?>)"></div>
                <div class="image-block width-35 dinline-block" style="background-image: url(<?php echo e(asset('exports/images/offers/' . $offer->images[0])); ?>)"></div>
            </div>
            <div class="main-conditions-title">
                <div class="commercial dinline-block section-title width-40 m-r-25">
                    <?php if(isset($params['commercial']) && !empty($params['commercial'])): ?>
                        Коммерческие условия
                    <?php endif; ?>
                </div>
                <div class="desc dinline-block section-title width-35">
                    <?php if(isset($params['main']['description']) && !empty($params['main']['description'])): ?>
                        Описание
                    <?php endif; ?>
                </div>
            </div>
            <div class="main-conditions">
                <div class="conditions dinline-block width-40 m-r-25">
                    <?php if(isset($params['commercial']) && !empty($params['commercial'])): ?>
                        <table class="width-100">
                            <?php if(isset($params['commercial']['main_rent'])): ?>
                                <tr>
                                    <td>Арендная ставка</td>
                                    <td>
                                        Арендуемая площадь
                                        <?php
                                            $price = "price_{$offer->status}";
                                            $fmt = ($offer->price_unit == 'USD') ? 'en_US' : 'ru_RU';
                                            $fprice = new NumberFormatter($fmt, NumberFormatter::CURRENCY);
                                        ?>
                                        <?php echo e($fprice->formatCurrency($offer->{$price}, $offer->price_unit)); ?>

                                        <?php echo ($offer->status == 'rent') ? " мес." : ''; ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if(isset($params['commercial']['opp_expenses'])): ?>
                                <tr>
                                    <td>Эксплуатационные расходы</td>
                                    <td>Нет</td>
                                </tr>
                            <?php endif; ?>
                            <?php if(isset($params['commercial']['vat'])): ?>
                                <tr>
                                    <td>НДС</td>
                                    <td>Не включен</td>
                                </tr>
                            <?php endif; ?>
                            <?php if(isset($params['commercial']['building_type'])): ?>
                                <tr>
                                    <td>Тип здания</td>
                                    <td><?php echo e($offer->building['type']); ?></td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="description dinline-block width-35">
                    <?php if(isset($params['main']['description']) && !empty($params['main']['description'])): ?>
                        <div class="width-100 dinline-block">
                            <?php echo e($offer->description); ?>

                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="general-info width-100">
                <div class="info-table dinline-block width-50 m-r-25">
                    <?php if(isset($params['general']) && !empty($params['general'])): ?>
                        <div class="section-title">Общие характеристики</div>
                        <table class="width-100">
                            <thead>
                                <tr>
                                    <?php if(isset($params['general']['total_area'])): ?> <th>Общая площадь</th> <?php endif; ?>
                                    <?php if(isset($params['general']['free_area'])): ?> <th>Свободная площадь</th> <?php endif; ?>
                                    <?php if(isset($params['general']['storeys'])): ?> <th>Этажность</th> <?php endif; ?>
                                    <?php if(isset($params['general']['building_type'])): ?> <th>Тип здания</th> <?php endif; ?>
                                    <?php if(isset($params['general']['infrastructure'])): ?> <th>Инфраструктура</th> <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if(isset($params['general']['total_area'])): ?> <td><?php echo e($offer->area); ?> м²</td> <?php endif; ?>
                                    <?php if(isset($params['general']['free_area'])): ?> <td><?php echo e($offer->area_free); ?> м²</td> <?php endif; ?>
                                    <?php if(isset($params['general']['storeys'])): ?> <td><?php echo e($offer->building['storeys']); ?></td> <?php endif; ?>
                                    <?php if(isset($params['general']['building_type'])): ?> <td><?php echo e($offer->building['type']); ?></td> <?php endif; ?>
                                    <?php if(isset($params['general']['infrastructure'])): ?> <td><?php echo e($offer->features['car-place'] == 'parking' ? 'АВТОПАРКОВКА' : ''); ?></td> <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <div class="info-notice dinline-block width-25">
                    <?php if(isset($params['main']['metro'])): ?>
                        <div class="info-location width-100">
                            <p class="box-title">Расположение</p>
                            <div class="metro location-detail">
                                <img src="<?php echo e(asset('exports/images/metro_icon.png')); ?>" alt="">
                                <span class="detail-title">

                                <?php if($metro = $offer->location['metro']): ?>
                                        <?php $__currentLoopData = $metro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $loop->last ? $name.'' : $name.', '; ?>

                                            <?php if($loop->iteration == 2): ?> <?php break; ?> <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                            </span>
                            </div>
                            <div class="car dinline-block location-detail width-50">
                                <img src="<?php echo e(asset('exports/images/car_icon.png')); ?>" alt="">
                                <span class="detail-title">5 мин</span>
                            </div>
                            <div class="walk dinline-block location-detail width-50">
                                <img src="<?php echo e(asset('exports/images/human_icon.png')); ?>" alt="">
                                <span class="detail-title">15 мин</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="info-table width-50">
                    <?php if(isset($params['technical']) && !empty($params['technical'])): ?>
                        <div class="section-title">Технические характеристики здания</div>
                        <table class="width-100">
                            <thead>
                                <tr>
                                    <?php if($params['technical']['lift']): ?> <th>Наличие лифта</th> <?php endif; ?>
                                    <?php if($params['technical']['units_count']): ?> <th>Количество юнитов</th> <?php endif; ?>
                                    <?php if($params['technical']['lift']): ?> <th>Лифты</th> <?php endif; ?>
                                    <?php if($params['technical']['columns_step']): ?> <th>Шаг колонн</th> <?php endif; ?>
                                    <?php if($params['technical']['conditioning']): ?> <th>Кондиционирование</th> <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if($params['technical']['lift']): ?> <td><?php echo e(($offer->building['lift'] == 'yes') ? 'ДА' : 'НЕТ'); ?></td> <?php endif; ?>
                                    <?php if($params['technical']['units_count']): ?> <td><?php echo e($offer->propertys_count); ?></td> <?php endif; ?>
                                    <?php if($params['technical']['lift']): ?> <td>3</td> <?php endif; ?>
                                    <?php if($params['technical']['columns_step']): ?> <td>6.0</td> <?php endif; ?>
                                    <?php if($params['technical']['conditioning']): ?> <td>Центральная четырёхтрубная система</td> <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php $__env->startComponent('exports.components.2.footer', ['offer' => $offer]); ?> <?php if (isset($__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e)): ?>
<?php $component = $__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e; ?>
<?php unset($__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
        <p class="page-break"></p>

        <?php $__env->startComponent('exports.components.2.header', ['offer' => $offer, 'logo' => $logo]); ?> <?php if (isset($__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35)): ?>
<?php $component = $__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35; ?>
<?php unset($__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

        <div class="properties-block width-100">
            <div class="properties-table dinline-block width-53 m-r-25">
                <table class="width-100">
                    <thead>
                    <tr>
                        <th>Этаж</th>
                        <th>Площадь, м2</th>
                        <th>Ставка, руб/м2/г</th>
                        <th>Статус</th>
                        <th>Свободно</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if($offer->propertys->count()): ?>
                        <?php $__currentLoopData = $offer->propertys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(json_decode($property->features, true)['floor'] ?? 1); ?></td>
                                <td><?php echo e($property->area); ?></td>
                                <td><?php echo e($property->price_rent); ?></td>
                                <td><?php echo e($property->status == 'rent' ? 'аренда' : 'продажа'); ?></td>
                                <td><?php echo e($property->created_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="properties-images dinline-block width-23">
                <?php if(!empty($offer->propertys[0]->images)): ?>
                    <?php ($images = json_decode($offer->propertys[0]->images, 'true')); ?>
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="image width-100" style="background-image: url(<?php echo e($image); ?>)"></div>
                        <?php if($loop->iteration == 3): ?>
                            <?php break; ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>

        <?php $__env->startComponent('exports.components.2.footer', ['offer' => $offer, 'params' => $params]); ?> <?php if (isset($__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e)): ?>
<?php $component = $__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e; ?>
<?php unset($__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

        <p class="page-break"></p>

        <?php $__env->startComponent('exports.components.2.header', ['offer' => $offer, 'logo' => $logo]); ?> <?php if (isset($__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35)): ?>
<?php $component = $__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35; ?>
<?php unset($__componentOriginala7479837a9e03d9136c1a8c5f802e9b9b141dd35); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

        <div class="plan-block width-100">
            <div class="dinline-block width-53 m-r-25">
                <div class="section-title">План помещений</div>
                <?php if($images = json_decode($offer->plan_images, true)): ?>
                    <?php if(isset($images[0])): ?>
                        <div class="main-plan-image width-100">
                            <div class="image" style="background-image: url(<?php echo e(asset($images[0])); ?>)"></div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($images[1])): ?>
                        <div class="properties-images dinline-block width-47 m-r-25">
                            <div class="image" style="background-image: url(<?php echo e(asset($images[1])); ?>)"></div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset($images[2])): ?>
                        <div class="properties-images dinline-block width-47">
                            <div class="image" style="background-image: url(<?php echo e(asset($images[2])); ?>)"></div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="properties-images dinline-block width-23">
                <?php if(isset($offer->sales_agent) && !empty($offer->sales_agent)): ?>
                    <div class="section-title">Контакты</div>
                    <?php if(isset(json_decode($offer->sales_agent, true)['photo'])): ?>
                        <div class="image width-100" style="background-image: url(<?php echo e(json_decode($offer->sales_agent, true)['photo']); ?>)"></div>
                    <?php endif; ?>
                    <?php if(isset(json_decode($offer->sales_agent, true)['organization'])): ?>
                        <div class="sales-agent-detail width-100">
                            <div class="title"><?php echo e(json_decode($offer->sales_agent, true)['organization']); ?></div>
                            <div class="subtitle"><?php echo e(json_decode($offer->sales_agent, true)['category'] ?? ''); ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if(isset(json_decode($offer->sales_agent, true)['phone'])): ?>
                        <div class="sales-agent-contacts width-100">
                            <span><?php echo e(json_decode($offer->sales_agent, true)['phone']); ?></span>
                            <br>
                            <span ><?php echo e(json_decode($offer->sales_agent, true)['email'] ?? ''); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <?php $__env->startComponent('exports.components.2.footer', ['offer' => $offer, 'params' => $params]); ?> <?php if (isset($__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e)): ?>
<?php $component = $__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e; ?>
<?php unset($__componentOriginal9aabfb265c8bc47f9570fa800b36d0c596dcfa1e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    </div>
    <p class="page-break"></p>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\prema\resources\views/exports/templates/2.blade.php ENDPATH**/ ?>