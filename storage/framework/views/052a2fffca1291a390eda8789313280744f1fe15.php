

<?php $__env->startSection('title'); ?>Панель адміністратора - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер замовлення</th>
                <th>ПІБ</th>
                <th>Телефон</th>
                <th>Дата відправки</th>
                <th>Сума</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($order->id); ?>

                        </td>
                        <td>
                            <?php echo e($order->name); ?>

                        </td>
                        <td>
                            <?php echo e($order->phone); ?>

                        </td>
                        <td>
                            <?php echo e($order->updated_at->format('H:i d/m/y')); ?>

                        </td>
                        <td>
                            <?php echo e($order->calculateFullSum()); ?> ₴
                        </td>
                        <td>
                            <a class="btn btn-success" href="
                            <?php if (\Illuminate\Support\Facades\Blade::check('admin')): ?>
                                <?php echo e(route('orders.show', $order)); ?>

                            <?php else: ?>
                                <?php echo e(route('user.orders.show', $order)); ?>

                            <?php endif; ?>
                            " role="button" aria-disabled="true">Більше</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/admin/orders/orders.blade.php ENDPATH**/ ?>