@extends('base')

@section('title', 'Listes des commentaire')


@section('content')

        <div class="row">
 <h1>Listes de tous les commentaires</h1>
    {{-- <a href="/ajouter_note" class="btn btn-primary">Ajouter une note</a > --}}
        <hr>  
           @if (session('status'))
        <div class="alert alert-succes">
          {{session('status')}}
        </div>
        @endif

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
                    
                 {{-- @endforeach --}}
                           <td>
                            {{-- <form action="/delete_commentaire:{{$commentaire->id}}" method="post">
                                @csrf @method('DELETE')
                      
    
                            <a href="/delete_commentaire/{{$commentaire->id}}" class="btn btn-primary">delete</a>
                           
                         <a href="/modif_commentaire/{{$commentaire->id}}" class="btn btn-warning">Update</a>
                         </form> --}}

                         <form action="/delete_commentaire/{{$commentaire->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete</button>
                            <a href="/modif_commentaire/{{$commentaire->id}}" class="btn btn-warning">Update</a>

                        </form>


                           </td>
                    

                   </td> 
                    </tr>
                @endforeach
         </table>
        @stop