

<?php $__env->startSection('title'); ?>Панель адміністратора - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <h2>Замовлення <?php echo e($order->id); ?></h2>
        <p>Замовник: <?php echo e($order->name); ?></p>
        <p>Номер телефона: <?php echo e($order->phone); ?></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Назва товару</th>
                    <th>Кількість</th>
                    <th>Ціна</th>
                    <th>Вартість</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->productsWithTrashed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($product->name); ?>

                    </td>
                    <td>
                        <span class="badge"><?php echo e($product->pivot->count); ?></span>
                    </td>
                    <td>
                        <?php echo e($product->price); ?> ₴
                    </td>
                    <td>
                        <?php echo e($product->getPriceForCount()); ?> ₴
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="3">Сума:</td>
                    <td><?php echo e($order->calculateFullSum()); ?> ₴</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>