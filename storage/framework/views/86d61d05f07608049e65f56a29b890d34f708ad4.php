
<?php if(isset($category)): ?>
    <?php $__env->startSection('title'); ?>Панель адміністратора(Редагувати категорію) - MyDevice.ua <?php $__env->stopSection(); ?>
<?php else: ?>
    <?php $__env->startSection('title'); ?>Панель адміністратора(Створити категорію) - MyDevice.ua <?php $__env->stopSection(); ?>
<?php endif; ?>


<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <h1 class="text-center">
            <?php if(isset($category)): ?>
                Редагувати категорію - <?php echo e($category->name); ?>

            <?php else: ?>
                Створити категорію
            <?php endif; ?>
        </h1>
        <form action="
            <?php if(isset($category)): ?>
                <?php echo e(route('categories.update', $category)); ?>

            <?php else: ?>
                <?php echo e(route('categories.store')); ?>

            <?php endif; ?>
        " method="POST" enctype="multipart/form-data">
            <?php if(isset($category)): ?><?php echo method_field('PUT'); ?><?php endif; ?>
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії</span>
                <input type="name" class="form-control" name="name" placeholder="Телефони" value="<?php echo e(old('name', isset($category) ? $category->name : null)); ?>" aria-describedby="addon-wrapping">
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'name_eng'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії англійською</span>
                <input type="name" class="form-control" name="name_eng" placeholder="Телефони" value="<?php echo e(old('name_eng', isset($category) ? $category->name_eng : null)); ?>" aria-describedby="addon-wrapping">
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'code'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Код</span>
                <input type="code" class="form-control" name="code" placeholder="phones" value="<?php echo e(old('code', isset($category) ? $category->code : null)); ?>" aria-describedby="addon-wrapping">
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text">Опис</span>
                <textarea class="form-control" name="description"><?php echo e(old('description', isset($category) ? $category->description : null)); ?></textarea>
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'description_eng'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Опис категорії англійською</span>
                <textarea class="form-control" name="description_eng"><?php echo e(old('description_eng', isset($category) ? $category->description_eng : null)); ?></textarea>
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="mb-3">
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>        
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/admin/categories/form.blade.php ENDPATH**/ ?>