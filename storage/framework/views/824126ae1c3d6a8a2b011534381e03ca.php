<?php $__env->startSection('title', 'Listes des commentaire'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <h1></h1>
        <?php if(session('status')): ?>
        <div class="alert alert-succes">
         <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>

        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="alert alert-danger"><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
      
        <form action="/ajout_commentaire/<?php echo e($id); ?>"  method="POST">
          
        <?php echo csrf_field(); ?>
       <div class="form-group">
    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom</font></font></label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez name" name="auteur">
      </div>

    <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">commentaire</font></font></label><br><br>
    <textarea class="form-control" id="exampleTextarea" rows="3" name="contenu"></textarea> <br><br>
    <input type="hidden" name="bien_id" value="<?php echo e($id); ?>">

    <button class="btn btn-primary">Ajouter un commentaire</button><br><br>
   
          <a class="btn btn-warning" href="/comment_liste">Liste des commentaires</a>
  </div>
         </form>
         
  


      <?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/commentaire/comm.blade.php ENDPATH**/ ?>