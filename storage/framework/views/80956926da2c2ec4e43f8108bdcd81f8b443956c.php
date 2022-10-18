

<?php $__env->startSection('title'); ?>Панель адміністратора - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <img src="<?php echo e(Storage::url($category->image)); ?>" class="w-100">
        <h2>Назва: <?php echo e($category->name); ?> Id: <?php echo e($category->id); ?></h2>
        <h3>Код: <?php echo e($category->code); ?></h3>
        <h3>Опис: <?php echo e($category->description); ?></h3>
        <h3>Кількість позицій: <?php echo e($category->products->count()); ?></h3>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/admin/categories/show.blade.php ENDPATH**/ ?>