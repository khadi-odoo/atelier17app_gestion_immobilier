<?php
    $class ??= null;
    $action ??= '';
    $method ??= 'post';
    $anothermethod ??= $method;
    $token ??= true;
    $value ??= 'Edit Me';
    $argument ??= null;
?>


<form method="<?php echo e($method); ?>" action="<?php echo e(route($action, $argument)); ?>">
    <?php if($token): ?>
        <?php echo csrf_field(); ?>
        <?php echo method_field($anothermethod ); ?>
        <input class="<?php echo \Illuminate\Support\Arr::toCssClasses(['btn btn-primary', $class]); ?>" type="submit" value="<?php echo e($value); ?>">
    <?php else: ?>
        <input class="<?php echo \Illuminate\Support\Arr::toCssClasses(['btn btn-primary', $class]); ?>" type="submit" value="<?php echo e($value); ?>">
    <?php endif; ?>
</form>
<?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/shared/formBtn.blade.php ENDPATH**/ ?>