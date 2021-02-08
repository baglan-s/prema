<div class="footer">
    <div class="footer-top width-100">
        <div class="owner-info dinline-block width-45 m-r-20">
            <span>COLLIERS INTERNATIONAL РОССИЯ, 123112 МОСКВА, ПРЕСНЕНСКАЯ НАБ., Д. 10</span>
            <br>
            <span>БЦ «БАШНЯ НА НАБЕРЕЖНОЙ», БЛОК С, 52 ЭТАЖ. ТЕЛ. +7 495 258 51 51 | WWW.COLLIERS.COM</span>
        </div>
        <div class="company-info dinline-block width-25">
            <?php if(isset($params['main']['address']) && !empty($params['main']['address'])): ?>
                <span><?php echo e($offer->location['city']); ?></span>
                <br>
                <span><?php echo e($offer->location['address']); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="footer-bottom"></div>
</div><?php /**PATH C:\xampp\htdocs\prema\resources\views/exports/components/footer.blade.php ENDPATH**/ ?>