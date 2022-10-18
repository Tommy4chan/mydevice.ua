

<?php $__env->startSection('title'); ?>Корзина - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Назва</th>
                <th>Кількість</th>
                <th>Ціна</th>
                <th>Вартість</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('product', $product->code)); ?>">
                                <img height="56px" src="<?php echo e(Storage::url($product->image)); ?>">
                                <?php echo e($product->name); ?>

                            </a>
                        </td>
                        <td><span class="badge"><?php echo e($product->pivot->count); ?></span>
                            <div class="btn-group form-inline">
                                <form action="<?php echo e(route('basket-remove', $product)); ?>" method="POST">
                                    <button type="submit" class="btn btn-danger" href="">-</button>
                                    <?php echo csrf_field(); ?>
                                </form>
                                <form action="<?php echo e(route('basket-add', $product)); ?>" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href="">+</button>
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </td>
                        <td><?php echo e($product->price); ?> ₴</td>
                        <td><?php echo e($product->getPriceForCount()); ?> ₴</td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="3">Сума:</td>
                    <td><?php echo e($order->getFullSum()); ?> ₴</td>
                </tr>
            </tbody>
        </table>
        <a class="btn btn-secondary" href="<?php echo e(route('basket-place')); ?>" role="button" aria-disabled="true">Підтвердити замовлення</a>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/basket.blade.php ENDPATH**/ ?>