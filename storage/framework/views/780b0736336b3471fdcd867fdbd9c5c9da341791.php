
<?php if(isset($category)): ?>
    <?php $__env->startSection('title'); ?>Панель адміністратора(Редагувати товар) - MyDevice.ua <?php $__env->stopSection(); ?>
<?php else: ?>
    <?php $__env->startSection('title'); ?>Панель адміністратора(Створити товар) - MyDevice.ua <?php $__env->stopSection(); ?>
<?php endif; ?>


<?php $__env->startSection('main_content'); ?>

<section class="category">
    <div class="container">
        <h1 class="text-center">
            <?php if(isset($product)): ?>
                Редагувати товар - <?php echo e($product->name); ?>

            <?php else: ?>
                Створити товар
            <?php endif; ?>
        </h1>
        <form action="
            <?php if(isset($product)): ?>
                <?php echo e(route('products.update', $product)); ?>

            <?php else: ?>
                <?php echo e(route('products.store')); ?>

            <?php endif; ?>
        " method="POST" enctype="multipart/form-data">
            <?php if(isset($product)): ?><?php echo method_field('PUT'); ?><?php endif; ?>
            <?php echo csrf_field(); ?>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'name'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва товару</span>
                <input type="name" class="form-control" name="name" placeholder="Телефон" value="<?php echo e(old('name', isset($product) ? $product->name : null)); ?>" aria-describedby="addon-wrapping">
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'name_eng'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Назва категорії англійською</span>
                <input type="name" class="form-control" name="name_eng" placeholder="Телефони" value="<?php echo e(old('name_eng', isset($product) ? $product->name_eng : null)); ?>" aria-describedby="addon-wrapping">
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'code'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Код</span>
                <input type="code" class="form-control" name="code" placeholder="phone" value="<?php echo e(old('code', isset($product) ? $product->code : null)); ?>" aria-describedby="addon-wrapping">
            </div>
            <select class="form-select" name="category_id">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($category->id); ?>" <?php if(isset($product)): ?><?php if($product->category_id == $category->id): ?>selected <?php endif; ?> <?php endif; ?>><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'description'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text">Опис</span>
                <textarea class="form-control" name="description"><?php echo e(old('description', isset($product) ? $product->description : null)); ?></textarea>
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'description_eng'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Опис категорії англійською</span>
                <textarea class="form-control" name="description_eng"><?php echo e(old('description_eng', isset($product) ? $product->description_eng : null)); ?></textarea>
            </div>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'image'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="mb-3">
                <input class="form-control" type="file" name="image" id="formFile">
            </div>
            <?php $__currentLoopData = ['hit' => 'Хіт продажу', 'new' => 'Новий товар', 'recommend' => 'Рекомендовано']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="<?php echo e($field); ?>"
                        <?php if(isset($product) && $product->$field === 1): ?>
                            checked = "checked"
                        <?php endif; ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    <?php echo e($title); ?>

                </label>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('layouts.error', ['fieldname' => 'price'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Ціна</span>
                <input type="code" class="form-control" name="price" value="<?php echo e(old('price', isset($product) ? $product->price : null)); ?>" aria-describedby="addon-wrapping">
            </div>

            <?php echo $__env->make('layouts.error', ['fieldname' => 'count'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Кількість</span>
                <input type="code" class="form-control" name="count" value="<?php echo e(old('count', isset($product) ? $product->count : null)); ?>" aria-describedby="addon-wrapping">
            </div>
            <button type="submit" class="btn btn-primary">Зберегти</button>
        </form>        
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/admin/products/form.blade.php ENDPATH**/ ?>