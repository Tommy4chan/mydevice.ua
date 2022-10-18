<div class="card mb-3  d-flex justify-content-center" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4 align-self-center d-flex justify-content-center">
      <img src="<?php echo e(Storage::url($product->image)); ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <?php if($product->isNew()): ?>
        <span class="badge text-bg-success">Новий продукт</span>
        <?php endif; ?>
        <?php if($product->isRecommend()): ?>
        <span class="badge text-bg-danger">Рекомендовано</span>
        <?php endif; ?>
        <?php if($product->isHit()): ?>
        <span class="badge text-bg-warning">Хіт продаж!</span>
        <?php endif; ?>
        <h5 class="card-title"><?php echo e($product->__('name')); ?></h5>
        <p class="card-text"><?php echo e($product->category->__('name')); ?></p>
        <p class="card-text"><?php echo e(\Illuminate\Support\Str::words($product->description, 25, '...')); ?></p>
        <?php if($type == 'discount'): ?>
        <p class="card-text price"><s><?php echo e($product->price); ?> ₴</s> <span>1590 ₴</span></p>
        <?php else: ?>
        <p class="card-text price"><?php echo e($product->price); ?> ₴</p>
        <?php endif; ?>
        <form action="<?php echo e(route('basket-add', $product)); ?>" method="POST">
          <?php if($product->isAvailable()): ?>
          <button type="submit" class="btn btn-dark">Додати у кошик</button>
          <?php else: ?>
          <a class="btn btn-danger">Нема в наявності</a>
          <?php endif; ?>
          <a class="btn btn-secondary" href="<?php echo e(route('product', $product->code)); ?>" role="button" aria-disabled="true">Переглянути</a>
          <?php echo csrf_field(); ?>
        </form>
      </div>
    </div>
  </div>
</div><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/layouts/productCard.blade.php ENDPATH**/ ?>