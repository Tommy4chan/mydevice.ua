

<?php $__env->startSection('title'); ?>Оформити замовлення - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <h1 class="text-center">Підтвердіть ваше замовлення</h1>
        <h2 class="text-center">Сума замовлення: <?php echo e($order->calculateFullSum()); ?> ₴</h2>
        <form action="<?php echo e(route('basket-confirm')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">ПІБ</span>
                <input type="name" class="form-control" name="name" placeholder="Іваненко Іван Іванович" aria-describedby="addon-wrapping">
            </div>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Номер телефону</span>
                <input type="phone" class="form-control" name="phone" placeholder="+380" aria-describedby="addon-wrapping">
            </div>
            <?php if(auth()->guard()->guest()): ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Email</span>
                <input type="phone" class="form-control" name="email" placeholder="example@domain.com" aria-describedby="addon-wrapping">
            </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Підтвердити замовлення</button>
        </form>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/order.blade.php ENDPATH**/ ?>