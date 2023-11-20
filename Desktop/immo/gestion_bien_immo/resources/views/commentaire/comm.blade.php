
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
    


      <form action="/ajout_commentaire" method="POST">

        @csrf
    
<div class="form-group">
      
    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nom</font></font></label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez name" name="auteur">
      </div>

    <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">donner votre apercu du bien</font></font></label><br><br>
    <textarea class="form-control" id="exampleTextarea" rows="3" name="contenu"></textarea> <br><br>

    <div class="form-group">
        <label for="exampleInputEmail1" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Date</font></font></label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="datePub">
      </div><br><br>

      <button type="submit" class="btn btn-primary">Ajouter un commentaire</button><br><br>

    <a class="btn btn-warning" href="/comment_liste">Liste des commentaires</a>

  </div>
         </form>


        </body>
        </html>