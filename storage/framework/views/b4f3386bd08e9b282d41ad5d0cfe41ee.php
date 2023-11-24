<?php 

$class ??= null;
$value ??= 'Send Me';
?> 

<button class="<?php echo \Illuminate\Support\Arr::toCssClasses(["btn btn-primary", $class ]); ?>" type="submit" >
        <?php echo e($value); ?>

</button>
<?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/shared/submitBtn.blade.php ENDPATH**/ ?>