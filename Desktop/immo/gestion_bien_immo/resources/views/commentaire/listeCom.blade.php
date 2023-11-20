{{-- @extends('master')

@section('title', 'List of eleves')

@section('H1')
    Liste des notes
@stop

@section('content') --}}
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

 <h1>Listes de tous les commentaires</h1>
        <hr>  
        <div class="alert alert-succes">
        </div>

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
               
                 @foreach($commentaires as $commentaire)
                <tr>
                    <td>{{$commentaire->id}}</td>
                    <td>{{$commentaire->auteur}}</td>
                    <td>{{$commentaire->contenu}}</td>
                    <td>{{$commentaire->datePub}}</td>
                    
                 @endforeach
                      
                    </tr>
         </table>
