

<?php $__env->startSection('title'); ?>Панель адміністратора - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Код</th>
                <th>Назва</th>
                <th>Категорія</th>
                <th>Ціна</th>
                <th>Кількість</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($product->id); ?>

                        </td>
                        <td>
                            <?php echo e($product->code); ?>

                        </td>
                        <td>
                            <?php echo e($product->name); ?>

                        </td>
                        <td>
                            <?php echo e($product->category->name); ?>

                        </td>
                        <td>
                            <?php echo e($product->price); ?>₴
                        </td>
                        <td>
                            <?php echo e($product->count); ?> шт.
                        </td>
                        <td>
                            <div class="btn-group form-inline">
                                <a class="btn btn-success" href="<?php echo e(route('product', $product->code)); ?>" role="button" aria-disabled="true">Відкрити</a>
                                <a class="btn btn-warning" href="<?php echo e(route('products.edit', $product)); ?>" role="button" aria-disabled="true">Редагувати</a>
                                <form action="<?php echo e(route('products.destroy', $product)); ?>" method="POST">
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger">Видалити</button>
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>" role="button" aria-disabled="true">Створити продукт</a>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/admin/products/products.blade.php ENDPATH**/ ?>