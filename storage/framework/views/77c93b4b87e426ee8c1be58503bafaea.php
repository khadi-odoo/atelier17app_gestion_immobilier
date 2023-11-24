<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title><?php echo $__env->yieldContent('title'); ?> | MonAgence </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agence</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            $route = request()
            ->route()
            ->getName();
            ?>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="<?php echo e(route('property.index')); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses(['nav-link', 'active'=> str_contains($route, 'property.')]); ?>">Les Biens</a>
                   
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-end mt-2">
            <div class="col-auto">
                <?php if(Route::has('login')): ?>
                <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/dashboard')); ?>" class="btn btn-primary">Dashboard</a>
                <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Log in</a>
                <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">Register</a>
                <?php endif; ?>
                <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <?php echo $__env->yieldContent('content'); ?>



</body>

</html><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/base.blade.php ENDPATH**/ ?>