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

        // $users = User::all();
         $commentaires = Commentaires::all();
        return view('commentaire.listeCom', compact('commentaires'));

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

// public function show($id){

//     $users = User::all();
//     $commentaires = Commentaires::find($id);
//     //dd($eleves);
//     return view('commentaire.listeCom',compact('commentaires','users'));

// }

public function update($id){
    $commentaires = Commentaires::find($id);
    return view('commentaire.update',compact('commentaires'));
}
 
public function rules()
     {
         return [
             'auteur' => 'required',
             'contenu' => 'required',
             'datePub' => 'required',
         ];
     }
     public function messages()
     {
         return [
             'auteur.required' => 'Desolé! Le champ auteur est obligatoire',
             'contenu.required' => 'Desolé! Le champ contenu est obligatoire',
             'datePub.required' => 'Desolé! Le champ datePub est obligatoire',
         ];
     }

 public function update_traitement (Request $request)
 {
     $request->validate($this->rules(), $this->messages());

     $commentaires= Commentaires::find($request->id);
     $commentaires->id = $request->id;
     $commentaires->auteur = $request->auteur;
     $commentaires->contenu = $request->contenu;
     $commentaires->datePub = $request->datePub;
     $commentaires->update();
    return redirect('/comment_liste')->with('status', 'commentaire Modifier avec succèss');

 }
 public function destroy($id){

     $commentaire = Commentaires::find($id);
     $commentaire->delete();
     return redirect('/comment_liste')->with('status', 'commentaire supprimer avec succèss');
}
}
