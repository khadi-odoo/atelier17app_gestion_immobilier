<?php

    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
?>
<div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-group', $class]); ?>"">
    <label for="<?php echo e($name); ?>"> <?php echo e($label); ?> </label>
    
    <select name="<?php echo e($name); ?>[]" id="<?php echo e($name); ?>"   class="form-select " multiple aria-label="multiple select example">
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option <?php if($value->contains($key)): echo 'selected'; endif; ?> value="<?php echo e($key); ?>"> <?php echo e($option); ?> </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
   

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/shared/select.blade.php ENDPATH**/ ?>