<?php
    $class ??= null;
?>

<div class="<?php echo \Illuminate\Support\Arr::toCssClasses(['form-check form-switch', $class]); ?>" >
    
    <input type="hidden" value = "0" name="<?php echo e($name); ?>">
    <input class="form-check-input"  type="checkbox" value="1"  name="<?php echo e($name); ?>" id="<?php echo e($name); ?>" <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> role = "switch" <?php if(old($name, $value ?? false)): echo 'checked'; endif; ?>>
    <label class="form-check-label" for="<?php echo e($name); ?>"> <?php echo e($label); ?> </label>
    
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
<?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/shared/checkbox.blade.php ENDPATH**/ ?>