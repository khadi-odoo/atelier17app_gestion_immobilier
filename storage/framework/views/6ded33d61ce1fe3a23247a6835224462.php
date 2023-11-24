<?php $__env->startSection('title', 'Tous les biens'); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between algin-items-center">
    <h1><?php echo $__env->yieldContent('title'); ?></h1>
    <a href="<?php echo e(route('admin.property.create')); ?>" class="btn btn-primary"> Ajouter</a>
</div>
<table class="table table-striped">

    <thead>
        <th>Titre</th>
        <th>Surface</th>
        <th>Prix</th>
        <th>Ville</th>
        <th>Vendu</th>
        <th>Options</th>
        <th class="text-end">Action</th>
    </thead>

    <tbody>
        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($property -> title); ?></td>
            <td><?php echo e($property -> surface); ?>m²</td>
            <td><?php echo e(number_format($property -> price, thousands_separator: '')); ?></td>
            <td><?php echo e($property -> city); ?></td>
            <td><?php echo e($property -> sold === 1 ? 'VENDU' : 'EN VENTE'); ?></td>
            <td>
            <?php $__currentLoopData = $property -> options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($option -> name); ?> <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
           
            <td> <?php echo $__env->make('shared.formBtn', [ 'method' =>'get', 'token' => false,  'value' => 'Editer', 'action' => 'admin.property.edit', 'argument' => $property ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </td>
            <td> <?php echo $__env->make('shared.formBtn', [ 'anothermethod' => 'delete', 'class' => 'btn btn-danger', 'value' => 'Supprimer', 'action' => 'admin.property.destroy', 'argument' => $property ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
   
   
   
</table>
<?php echo e($properties -> links()); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/admin/properties/index.blade.php ENDPATH**/ ?>