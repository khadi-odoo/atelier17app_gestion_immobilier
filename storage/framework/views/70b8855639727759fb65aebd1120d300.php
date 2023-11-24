<?php $__env->startSection('title', 'Tous les options'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between algin-items-center">
    <h1><?php echo $__env->yieldContent('title'); ?></h1>
    <a href="<?php echo e(route('admin.option.create')); ?>" class="btn btn-primary"> Ajouter</a>
</div>
<table class="table table-striped">

    <thead>
        <th>Nom</th>
   
        <th class="text-end">Action</th>
    </thead>

    <tbody>
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($option -> name); ?></td>     
            <td> <?php echo $__env->make('shared.formBtn', [ 'method' =>'get', 'token' => false,  'value' => 'Editer', 'action' => 'admin.option.edit', 'argument' => $option ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </td>
            <td> <?php echo $__env->make('shared.formBtn', [ 'anothermethod' => 'delete', 'class' => 'btn btn-danger', 'value' => 'Supprimer', 'action' => 'admin.option.destroy', 'argument' => $option ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
   
   
   
</table>
<?php echo e($options -> links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/admin/options/index.blade.php ENDPATH**/ ?>