<?php $__env->startSection('title', 'Listes des commentaire'); ?>


<?php $__env->startSection('content'); ?>

        <div class="row">
 <h1>Listes de tous les commentaires</h1>
    
        <hr>  
           <?php if(session('status')): ?>
        <div class="alert alert-succes">
          <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>

         <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>contenu</th>
                    <th>datePublication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               
                 <?php $__currentLoopData = $commentaires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentaire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($commentaire->id); ?></td>
                    <td><?php echo e($commentaire->auteur); ?></td>
                    <td><?php echo e($commentaire->contenu); ?></td>
                    <td><?php echo e($commentaire->datePub); ?></td>
                    
                 
                           <td>
                            

                         <form action="/delete_commentaire/<?php echo e($commentaire->id); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-primary">Delete</button>
                            <a href="/modif_commentaire/<?php echo e($commentaire->id); ?>" class="btn btn-warning">Update</a>

                        </form>


                           </td>
                    

                   </td> 
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </table>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/commentaire/listeCom.blade.php ENDPATH**/ ?>