<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(URL::to('/')); ?>/css/style.css">
    <title><?php echo app('translator')->get('main.shop_name'); ?> <?php echo $__env->yieldContent('title'); ?></title>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><img src="/img/logo.png" alt="" width="35" height="35"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo Route::currentRouteNamed('home') ?  'active' : '' ?>" aria-current="page" href="<?php echo e(route('home')); ?>">Головна сторінка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo Route::currentRouteNamed('hotprices') ?  'active' : '' ?>" href="<?php echo e(route('hotprices')); ?>">Гарячі ціни</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Категорії
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php $__currentLoopData = $categoriesList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a class="dropdown-item <?php echo e(Request::url() == route('category', $category->code) ?  'active' : ''); ?>" href="<?php echo e(route('category', $category->code)); ?>"><?php echo e($category->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo Route::currentRouteNamed('basket') ?  'active' : '' ?>" href="<?php echo e(route('basket')); ?>">Корзина</a>
                    </li>
                    <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo Route::currentRouteNamed('login') ?  'active' : '' ?>" href="<?php echo e(route('login')); ?>">Увійти</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo Route::currentRouteNamed('register') ?  'active' : '' ?>" href="<?php echo e(route('register')); ?>">Зареєструватися</a>
                        </li>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('orders.index')); ?>">Мій Кабінет</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('user.orders.index')); ?>">Мій Кабінет</a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('get-logout')); ?>">Вийти</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ('ua' == session('language')) ?  'active' : '' ?>" href="<?php echo e(route('changeLanguage', 'ua')); ?>">Ua</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link <?php echo ('eng' == session('language')) ?  'active' : '' ?>" href="<?php echo e(route('changeLanguage', 'eng')); ?>">Eng</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 75px;">
            <?php echo e(session()->get('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php elseif(session()->has('warning')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 75px;">
            <?php echo e(session()->get('warning')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php echo $__env->yieldContent('main_content'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH D:\Projects\Sites\OpenServer\domains\mydevice.ua\resources\views/layouts/defaultLayout.blade.php ENDPATH**/ ?>