<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

<link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.css">
    
    <title><?php echo $__env->yieldContent('title'); ?> | Administration </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                $route = request()->route()->getName();
            ?>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="<?php echo e(route('admin.property.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'active' => str_contains($route, 'property.')]); ?>" >Gérer les bien</a>
                    <a class="nav-link" href="<?php echo e(route('admin.option.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'active' => str_contains($route, 'option.')]); ?>" >Gérer les options</a>
                    
                </div>
            </div>
        </div>
        <div class="container-fluid">
            
        </div>

    </nav>

    <div class="container mt-5">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul class="my-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script > 
    new TomSelect('select[multiple]', {plugins: {remove_button : { title: 'supprimer'}}}); 
    </script>

</body>

</html>
<?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/admin/admin.blade.php ENDPATH**/ ?>