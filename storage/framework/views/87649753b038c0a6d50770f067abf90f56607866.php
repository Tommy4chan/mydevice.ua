

<?php $__env->startSection('title'); ?>Панель адміністратора - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Номер категорії</th>
                <th>Код</th>
                <th>Назва</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($category->id); ?>

                        </td>
                        <td>
                            <?php echo e($category->code); ?>

                        </td>
                        <td>
                            <?php echo e($category->name); ?>

                        </td>
                        <td>
                            <div class="btn-group form-inline">
                                <form action="" method="POST">
                                    <button type="submit" class="btn btn-success">Відкрити</button>
                                    <?php echo csrf_field(); ?>
                                </form>
                                <form action="" method="POST">
                                    <button type="submit" class="btn btn-warning">Редагувати</button>
                                    <?php echo csrf_field(); ?>
                                </form>
                                <form action="" method="POST">
                                    <button type="submit" class="btn btn-danger">Видалити</button>
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <a class="btn btn-success" href="<?php echo e(route('categories.create')); ?>" role="button" aria-disabled="true">Створити категорію</a>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/admin/categoryPage.blade.php ENDPATH**/ ?>