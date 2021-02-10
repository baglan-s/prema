<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <title><?php echo e($title ?? 'Prema Pro'); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('block-styles'); ?>
    <link href="<?php echo e(asset('css/preloader.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
</head>
<body>
<div id="app">

    <header>
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4 col-sm-6 col-6">
                    <div class="user-action">
                        <?php if(auth()->guard()->check()): ?>
                        <form action="<?php echo e(route('logout')); ?>" class="header-logout-form" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="submit" value="LogOut">
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 d-md-block d-none">
                    <div class="account-info d-flex justify-content-center">
                        <?php if(auth()->guard()->check()): ?>
                        <p class="mb-0">Account name: <?php echo e(auth()->user()->email ?? 'User'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-6">
                    <div class="header-icon-menu d-flex justify-content-end align-items-center">
                        <a href="tel:+77451236542" class="icon icon-menu-item d-md-none d-sm-inline">
                            <img class="" src="<?php echo e(asset('img/phone-icon.png')); ?>" alt="">
                        </a>
                        <a href="tel:+77451236542" class="phone d-md-inline d-sm-none d-none">
                            <span class="">+7 (745) 123 65 42</span>
                        </a>






                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="main-wrapper py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div class="loader">
            <div class="l_main">
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
                <div class="l_square"><span></span><span></span><span></span></div>
            </div>
        </div>
        <?php $__env->startComponent('components.exports.export-filter'); ?> <?php if (isset($__componentOriginale60c4c7303b50124e517afba47b48510c892c8f9)): ?>
<?php $component = $__componentOriginale60c4c7303b50124e517afba47b48510c892c8f9; ?>
<?php unset($__componentOriginale60c4c7303b50124e517afba47b48510c892c8f9); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    </main>
    <footer>
        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="owner-name d-flex justify-content-center">
                    <a href="">Prema pro</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php echo $__env->yieldPushContent('block-scripts'); ?>
<script src="<?php echo e(asset('js/custom.js')); ?>"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\prema\resources\views/layouts/custom.blade.php ENDPATH**/ ?>