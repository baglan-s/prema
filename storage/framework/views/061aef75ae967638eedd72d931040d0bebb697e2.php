<div class="header">
    <div class="header-top">
        <div class="header-title">
            <p><?php echo e($offer->name); ?></p>
        </div>
        <div class="header-logo">

            <div class="img"></div>
        </div>
    </div>
    <div class="header-bottom width-100">
        <div class="header-address width-45 dinline-block">
            <?php if(isset($params['main']['address']) && !empty($params['main']['address'])): ?>
                <?php echo e($offer->location['city']); ?>, <?php echo e($offer->location['address']); ?>

            <?php endif; ?>
        </div>
        <div class="header-slogan width-35 dinline-block">Аренда. Офисные помещения</div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\prema\resources\views/exports/components/1/header.blade.php ENDPATH**/ ?>