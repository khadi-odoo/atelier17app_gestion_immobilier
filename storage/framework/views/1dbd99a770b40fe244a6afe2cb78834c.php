<?php $__env->startSection('title', 'Tous nos bien'); ?>

<?php $__env->startSection('content'); ?>

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" name="price" placeholder="Buget max" class="form-control" value=" <?php echo e($input['price'] ?? ''); ?> ">
        <input type="number" name="surface" placeholder="Surface minimale" class="form-control" value=" <?php echo e($input['surface'] ?? ''); ?> ">
        <input type="number" name="rooms" placeholder="Nombre de pieces minimum" class="form-control" value=" <?php echo e($input['rooms'] ?? ''); ?> ">
        <input type="text" name="title" placeholder="Mot clef" class="form-control" value=" <?php echo e($input['title'] ?? ''); ?> ">

        <button class="btn-primary -btn-sm flex-grow-0">
            Rechercher
        </button>
    </form>
</div>
<div class="container">
    <div class="row">


        <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-3 my-4">
            <?php echo $__env->make('property.card', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col text-center">
            <h3>Aucun Bien ne correspond à votre recherche</h3>
        </div>
        <?php endif; ?>

    </div>

    <div class="my-4">
        <?php echo e($properties->links()); ?>

    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/property/index.blade.php ENDPATH**/ ?>