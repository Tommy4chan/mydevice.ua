<?php $__errorArgs = [$fieldname];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 75px;">
        <?php echo e($message); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php /**PATH D:\Projects\OpenServer\domains\mydevice.ua\resources\views/layouts/error.blade.php ENDPATH**/ ?>