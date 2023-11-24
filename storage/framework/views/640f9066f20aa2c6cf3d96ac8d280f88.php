<div class="card">
    <?php if($property->image): ?>
    <img src="/storage/<?php echo e($property->image); ?>" class="card-img-top" alt="">
    <?php endif; ?>
    <div class="card-body">
        <h5 class="card-title"><?php echo e($property->title); ?></h5>
        <p class="card-text"><?php echo e($property -> description); ?></p>

        <p class="card-text">
            <i class="bi-geo-alt-fill"><?php echo e($property -> address); ?> </i>
        </p>
        <p class="card-text"><?php echo e($property->surface); ?>m² </p>

        <a href="<?php echo e(route('property.show', ['slug' => $property->getSlug(), 'property' => $property])); ?>" class="btn btn-primary">Intéréssé ?</a>

        <div class="text-primary fw-bold " style="font-size:1.4em;">
            <?php echo e(number_format($property->price, thousands_separator: '')); ?>FCFA
        </div>
        <i class="bi-chat-square"></i>

        <a href="/comment/<?php echo e($property -> id); ?>">Commentaires</a>
    </div>
</div><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/property/card.blade.php ENDPATH**/ ?>