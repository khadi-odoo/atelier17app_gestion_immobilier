<?php $__env->startSection('title', $property ->exists ? 'Editer un bien ' : 'Créer un bien' ); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldContent('title'); ?>

<form class="vstack gap-2" action="<?php echo e(route( $property ->exists ? 'admin.property.update' : 'admin.property.store', ['property' =>  $property ] )); ?>" method="post"  enctype="multipart/form-data"s  >
    <?php echo csrf_field(); ?>
    <?php echo method_field($property->exists ? 'put' : 'post'); ?>

    <div class=" row">
            <?php echo $__env->make('shared.input', [ 'type' => 'file', 'class' => 'col' ,  'label' => 'Image', 'name' => 'image'] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
            <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Titre', 'name' => 'title', 'value' => $property->title] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('shared.input', [ 'class' => 'col' ,  'label' => 'Surface', 'name' => 'surface', 'value' => $property->surface] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('shared.input', [ 'class' => 'col' ,  'label' => 'Prix', 'name' => 'price', 'value' => $property->price] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
    </div>
    <div class=" row-1 ">
        <?php echo $__env->make('shared.input', [ 'type' => 'textarea', 'name' => 'description', 'value' => $property->description] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    
    <div class="row">
        <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Pieces', 'name' => 'rooms', 'value' => $property->rooms] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Chambre', 'name' => 'bedrooms', 'value' => $property->bedrooms] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Etage', 'name' => 'floor', 'value' => $property->floor] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
    </div>

    <div class="row">
        <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Adresse', 'name' => 'address', 'value' => $property->address] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
        <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Vile', 'name' => 'city', 'value' => $property->city] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('shared.input', [ 'class' => 'col' , 'label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
    </div>

    <div class="row justify-content-center" >
        <?php echo $__env->make('shared.select', [ 'name' => 'options', 'label' => 'Cliquer pour selectionner une Options : ',  'value' => $property->options()->pluck('id'), 'options'=> $options, 'multiple' => true] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
    </div>
    <div class="row">
        <?php echo $__env->make('shared.checkbox', [ 'name' => 'sold', 'label' => 'Vendu',  'value' => $property->sold  ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>     
    </div>

    <div class="row mt-3">
    <?php echo $__env->make('shared.submitBtn', [ 'value' =>  $property -> exists ? 'Editer' : 'Créer'  ] , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>        
    </div>
   

    
    
   
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/admin/properties/form.blade.php ENDPATH**/ ?>