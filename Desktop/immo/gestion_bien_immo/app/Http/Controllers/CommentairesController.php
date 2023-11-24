<?php

namespace App\Http\Controllers;

use App\Models\Commentaires;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentairesController extends Controller
{




    public function commenter(Request $request, $id)
    {
        //$users = 


        return view('commentaire.comm', ['id' => $id]);
    }

    public function liste_commentaire()
    {

        // $users = User::all();
        $commentaires = Commentaires::all();
        return view('commentaire.listeCom', compact('commentaires'));
    }
    public function commentaire_ajouter(Request $request)
    {
        $request->validate([

            'contenu' => 'required|between:0,100',
        ]);
        //dd($request->id);
        //On crée une nouvelle instance du modèle Commentaires
        $commentaire = new Commentaires();
        //On attribue les valeurs des champs du formulaire aux propriétés du modèle Commentaires
        $commentaire->auteur = Auth::user()->name;
        $commentaire->contenu = $request->contenu;
        $commentaire->user_id = $request -> id;
        $commentaire->bien_id = $request->bien_id;

        $commentaire->save();
        return back();
    }

    public function update($id)
    {
        //on utilise la méthode find($id) pour récupèrer un enregistrement par son identifiant.
        $commentaires = Commentaires::find($id);
        return view('commentaire.update', compact('commentaires'));
    }

    public function rules()
    {
        return [

            'contenu' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'contenu.required' => 'Desolé! Le champ contenu est obligatoire',
        ];
    }

    public function update_traitement(Request $request)
    {
      
        $request->validate($this->rules(), $this->messages());

       //dd(Auth::user()->name);
        $commentaires = Commentaires::findOrFail($request->id);
        //$commentaires->id = $request->id;
        $commentaires->auteur = Auth::user()->name;
        $commentaires->contenu = $request->contenu;
        $commentaires->update();
        return redirect('/comment_liste')->with('status', 'commentaire Modifier avec succèss');
    }
    public function destroy($id, Property $property)
    {
        Gate::authorize('delete', $property);

        $commentaire = Commentaires::find($id);
        $commentaire->delete();
        return redirect('/comment_liste')->with('status', 'commentaire supprimer avec succèss');
    }
}
