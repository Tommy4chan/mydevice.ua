
<form method="GET" action="<?php echo e(route('category', $category->code)); ?>">
    <div class="row">
        <div class="col">
            <div class="input-group mb-3">
                <input type="text" name="price_from" class="form-control" placeholder="0" value="<?php echo e(request()->price_from); ?>">
                <span class="input-group-text">-</span>
                <input type="text" name="price_to" class="form-control" placeholder="99999" value="<?php echo e(request()->price_to); ?>">
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="hit" type="checkbox" id="flexCheckDefault" <?php if(request()->has('hit')): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Хіт продаж
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="new" type="checkbox" id="flexCheckDefault" <?php if(request()->has('new')): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Новий продукт
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input" name="recommend" type="checkbox" id="flexCheckDefault" <?php if(request()->has('recommend')): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="flexCheckDefault">
                    <?php echo app('translator')->get('main.filter.recommend'); ?>
                </label>
            </div>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-success">Фільтр</button>
        </div>
        <div class="col">
            <a href="<?php echo e(route('category', $category->code)); ?>" class="btn btn-danger">Скинути</a>
        </div>
    </div>
</form>
<?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/layouts/filter.blade.php ENDPATH**/ ?>