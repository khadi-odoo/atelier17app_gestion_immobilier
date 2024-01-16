@extends('base')

@section('title', 'Listes des commentaire')

@section('content')

    <div class="row">
        <h1></h1>
        @if(session('status'))
        <div class="alert alert-succes">
         {{session('status')}}
        </div>
        @endif

        <ul>
            @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
            @endforeach
         </ul>
      {{-- <form action="/ajout_commentaire" method="POST"> --}}
        <form action="/ajout_commentaire/{{$id}}"  method="POST">
          
        @csrf
       <div class="form-group">


    <label for="exampleTextarea" class="form-label mt-4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">commentaire</font></font></label><br><br>
    <textarea class="form-control" id="exampleTextarea" rows="3" name="contenu"></textarea> <br><br>
    <input type="hidden" name="bien_id" value="{{$id}}">

    <button class="btn btn-primary">Ajouter un commentaire</button><br><br>
   
          <a class="btn btn-warning" href="/comment_liste">Liste des commentaires</a>
  </div>
         </form>
         
  


      @stop