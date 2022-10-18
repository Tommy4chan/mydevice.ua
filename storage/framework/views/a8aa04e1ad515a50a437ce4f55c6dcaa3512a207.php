<?php $__env->startSection('title'); ?>Головна сторінка - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<header>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/1.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/2.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/3.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

</header>

<section class="popular-products">
    <div class="container">
        <h1 class="text-center">Популярні товари</h1>
        <div class="row" style="margin-top: 40px;">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 d-flex justify-content-center">
                    <?php echo $__env->make('layouts.productCard', compact('product'), ['type' => 'discount'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo e($products->links()); ?>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/home.blade.php ENDPATH**/ ?>