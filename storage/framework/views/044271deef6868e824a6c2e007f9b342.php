
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://bootswatch.com/5/pulse/bootstrap.css">
    <title>Document</title>
</head>
<body>
    


    <div class="row">
        <h1>Modifier le commentaire</h1>
        <?php if(session('status')): ?>
        <div class="alert alert-succes">
         <?php echo e(session('status')); ?>

        </div>
        <?php endif; ?>

        <form action="/update/traitement" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" class="form-control" style="display:none" name="id" value="<?php echo e($commentaires->id); ?>">
    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom</font></font></label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez name" name="auteur" value="<?php echo e($commentaires->auteur); ?>">
      </div>

    <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">donner votre apercu du bien</font></font></label><br><br>
    <textarea class="form-control" id="exampleTextarea" rows="3" name="contenu"><?php echo e($commentaires->contenu); ?></textarea>

    

      <button type="submit" class="btn btn-primary">Modifier un commentaire</button><br><br>
  </div>
         </form>
        </body>
        </html><?php /**PATH C:\Users\simplon\Desktop\immo\gestion_bien_immo\resources\views/commentaire/update.blade.php ENDPATH**/ ?>