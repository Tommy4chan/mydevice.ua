

<?php $__env->startSection('title'); ?><?php echo e($product->name); ?> - MyDevice.ua <?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<section class="product">
    <div class="container">
        <h1 class="text-center"><?php echo e($product->__('name')); ?></h1>
        <div class="row">
            <div class="col-lg-4 align-self-center">
                <img src="<?php echo e(Storage::url($product->image)); ?>" class="w-100">
            </div>
            <div class="col-lg-8 align-self-center">
            <?php if($product->isNew()): ?>
                <span class="badge text-bg-success">Новий продукт</span>
            <?php endif; ?>
            <?php if($product->isRecommend()): ?>
                <span class="badge text-bg-danger">Рекомендовано</span>
            <?php endif; ?>
            <?php if($product->isHit()): ?>
                <span class="badge text-bg-warning">Хіт продаж!</span>
            <?php endif; ?>
                <h2>Опис</h2>
                <p>
                    <?php echo e($product->__('description')); ?>

                </p>
                <h2>Характеристики</h2>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint et ipsa fugit? Commodi dolorum impedit 
                    laudantium voluptas ex in, aspernatur aut esse quos ipsa sunt reiciendis illo nisi pariatur perferendis.
                </p>
                <h3>Ціна: <?php echo e($product->price); ?> ₴</h3>
                <h3>Кількість: <?php echo e($product->count); ?> шт.</h3>
                <?php if($product->isAvailable()): ?>
                    <form action="<?php echo e(route('basket-add', $product)); ?>" method="POST">       
                            <button type="submit" class="btn btn-dark">Додати у кошик</button>
                        <?php echo csrf_field(); ?>
                    </form>
                <?php else: ?>
                    <form action="<?php echo e(route('subscription', $product)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php if(auth()->guard()->guest()): ?>
                            <?php echo $__env->make('layouts.error', ['fieldname' => 'email'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Email</span>
                                <input class="form-control" name="email" placeholder="example@domain.com" aria-describedby="addon-wrapping">
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-dark">Сповістити коли товар буде в наявності</button>
                    </form>
                    <a class="btn btn-danger">Нема в наявності</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.defaultLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/product.blade.php ENDPATH**/ ?>