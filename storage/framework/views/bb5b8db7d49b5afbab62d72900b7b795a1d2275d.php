

<?php $__env->startSection('title'); ?><?php echo e($category->name); ?> - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>


<section class="category">
    <div class="container">
        <img src="<?php echo e(Storage::url($category->image)); ?>" class="w-50">
        <h1 class="text-center"><?php echo e($category->__('name')); ?></h1>
        <h2 class="text-center"><?php echo e($category->__('description')); ?></h2>
        <?php echo $__env->make('layouts.filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row" style="margin-top: 40px;">
            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 d-flex justify-content-center">
                    <?php echo $__env->make('layouts.productCard', compact('product'), ['type' => 'normal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo e($category->products->links()); ?>

</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/category.blade.php ENDPATH**/ ?>