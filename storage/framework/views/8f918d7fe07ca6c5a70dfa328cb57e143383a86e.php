<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <title>Welcome!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm font-weight-bold" style="background-color:#29347A !important;">
                <div class="container">
                    <a class="navbar-brand text-white" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <?php if(auth()->guard()->guest()): ?>
                                <?php if(Route::has('login')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                    </li>
                                <?php endif; ?>

                                <?php if(Route::has('register')): ?>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <?php echo e(Auth::user()->name); ?>

                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <?php echo e(__('Logout')); ?>

                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header font-weight-bold">
                                    <?php echo e(__('Welcome!')); ?><big>&nbsp;</big>
                                </div>
                                <div class="card-body">
                                    <h6 class="font-weight-bold"><a href="<?php echo e(url('/home')); ?>">Go to Dashboard</a></h6>
                                    <hr style="height:0; border-top:2px solid #f2f2f2">
                                    <h6 class="mt-4 font-weight-bold">Downloads:</h6>
                                    <ul class="navbar-nav ml-auto font-weight-bold">
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-v0.1.xml')); ?>">property-feed-v0.1.xml</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-description-v0.1.txt')); ?>">property-feed-description-v0.1.txt</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-v0.2.xml')); ?>">property-feed-v0.2.xml</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-description-v0.2.txt')); ?>">property-feed-description-v0.2.txt</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-v1.1.xml')); ?>">property-feed-v1.1.xml</a>
                                        </li>
                                        <li class="nav-item mt-1" style="background-color:#f5f5f5">
                                            <a class="nav-link pl-3" href="<?php echo e(route('download', 'property-feed-description-v1.1.txt')); ?>">property-feed-description-v1.1.txt</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (PHP v<?php echo e(PHP_VERSION); ?>)
                    </div>
                </div>
            </main>

        </div>
    </body>
</html>
<?php /**PATH /var/www/sites/prema/resources/views/welcome.blade.php ENDPATH**/ ?>