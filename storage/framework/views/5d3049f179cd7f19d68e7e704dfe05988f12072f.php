

<?php $__env->startSection('title'); ?>Гарячі ціни - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="hot-prices">
    <div class="container">
        <h1 class="text-center">Гарячі ціни</h1>
        <div class="row" style="margin-top: 40px;">
            <div class="col-lg-6 d-flex justify-content-center">
                <?php echo $__env->make('layouts.productCard', ['type' => 'discount'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <?php echo $__env->make('layouts.productCard', ['type' => 'normal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/hotPrices.blade.php ENDPATH**/ ?>