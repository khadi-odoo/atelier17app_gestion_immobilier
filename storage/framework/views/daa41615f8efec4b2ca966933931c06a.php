<?php $__env->startSection('title', $option ->exists ? 'Editer un option ' : 'Créer un option' ); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldContent('title'); ?>

<form class="vstack gap-2" action="<?php echo e(route( $option ->exists ? 'admin.option.update' : 'admin.option.store', ['option' =>  $option ] )); ?>" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field($option->exists ? 'put' : 'post'); ?>

    <div class=" row">
            <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Nom de l\'option', 'name' => 'name', 'value' => $option->name] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
    </div>
    <?php echo $__env->make('shared.submitBtn', [ 'value' =>  $option -> exists ? 'Editer' : 'Créer'  ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
   
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/admin/options/form.blade.php ENDPATH**/ ?>