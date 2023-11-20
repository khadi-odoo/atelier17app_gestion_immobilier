<?php

namespace App\Http\Controllers;

use App\Models\Commentaires;
use App\Models\User;
use Illuminate\Http\Request;

class CommentairesController extends Controller
{




    public function commenter(){
        return view('commentaire.comm');
    }

    public function liste_commentaire(){
        return view('commentaire.listeCom');
    }


    public function commentaire_ajouter(Request $request){


        $request->validate([
            'auteur' => 'required|alpha|max:20', 
            'contenu' => 'required|between:0,100',
            'datePub' => 'required|date'
         ]);
    
    $commentaire = new Commentaires();

    $commentaire->id = $request->id;
    $commentaire->auteur = $request->auteur;
    $commentaire->contenu = $request->contenu;
    $commentaire->datePub = $request->datePub;
    $commentaire->save();
    return back();

    }

public function show($id){

    $users = User::all();
    $commentaires = Commentaires::find($id);
    //dd($eleves);
    return view('commentaire.listeCom',compact('commentaires','users'));
    dd($commentaires);

}

}
