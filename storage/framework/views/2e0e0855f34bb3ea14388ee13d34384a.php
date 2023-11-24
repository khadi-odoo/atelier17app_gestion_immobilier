<?php $__env->startSection('title', $property->title); ?>

<?php $__env->startSection('content'); ?>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">

        <div class="text-center">
            <h1><?php echo e($property->title); ?></h1>
            <h2><?php echo e($property->rooms); ?> pièces - <?php echo e($property->surface); ?>m²</h2>

            <div class="text-primary fw-bold" style="font-size: 4em;">
                <h1><?php echo e(number_format($property->price)); ?> FCFA</h1>
            </div>

            <hr>

            <div class="mt-4">
                <h4>Intéressé par ce bien ?</h4>
                <img src="/storage/<?php echo e($property->image); ?>" class="card-img-top" style="width: 350px; ">
            </div>



            <form action=" <?php echo e(route('property.contact', $property)); ?> " method="post">
                <?php echo csrf_field(); ?> 
                <?php echo method_field('post'); ?>
                <div class="row mt-3 g-3">
                   
                    <?php echo $__env->make('shared.input', ['class' => 'col', 'name' => 'firstname', 'label' => 'Nom', 'value' => 'jONh'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('shared.input', ['class' => 'col', 'name' => 'lastname', 'label' => 'Prénom' ,'value' => 'jONh'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="row mt-3">
                    <?php echo $__env->make('shared.input', ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone' ,'value' => '784445454 '], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="row mt-3">
                    <?php echo $__env->make('shared.input', [
                        'type' => 'email',
                        'class' => 'col',
                        'name' => 'email',
                        'label' => 'Email',
                        'value' => 'jONh@public.fr',
                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                
                <?php echo $__env->make('shared.input', ['type' => 'textarea','class' => 'col', 'name' => 'message','label' => 'Votre message'  ,'value' => 'mo super message'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="row mt-3">
                    <?php echo $__env->make('shared.submitBtn', ['value' => 'Envoyer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

            </form>
        </div>

        <div class="mt-4 ml-4 card border-primary shadow">
            <div class="card-body">
                <p class=" bg-opacity-100"> <strong> Description :</strong> <?php echo e($property->description); ?></p>

                <div class="row ">
                    <div class="col-8">
                        <h4>Caractéristiques</h4>
                        <table class="table table-striped">
                            <tr>
                                <td>Ville</td>
                                <td><?php echo e($property->city); ?></td>
                            </tr>
                            <tr>
                                <td>Surface habitable</td>
                                <td><?php echo e($property->surface); ?></td>
                            </tr>
                            <tr>
                                <td>Pièces</td>
                                <td><?php echo e($property->rooms); ?></td>
                            </tr>
                            <tr>
                                <td>Chambres</td>
                                <td><?php echo e($property->bedrooms); ?></td>
                            </tr>
                            <tr>
                                <td>Étage</td>
                                <td><?php echo e($property->floor ?: 'Rez de chaussée'); ?></td>
                            </tr>
                            <tr>
                                <td>Localisation</td>
                                <td><?php echo e($property->adress); ?></td>
                            </tr>
                            <tr>
                                <td>Code Postal</td>
                                <td><?php echo e($property->postal_code); ?></td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-4">
                        <h4>Spécificités</h4>
                        <ul class="list-group">
                            <?php $__currentLoopData = $property->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($option->name); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/property/show.blade.php ENDPATH**/ ?>