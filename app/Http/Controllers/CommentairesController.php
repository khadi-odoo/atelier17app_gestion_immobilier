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
            'auteur' => 'required|alpha|max:20',
            'contenu' => 'required|between:0,100',
        ]);
        //On crée une nouvelle instance du modèle Commentaires
        $commentaire = new Commentaires();
        //On attribue les valeurs des champs du formulaire aux propriétés du modèle Commentaires
        $commentaire->id = $request->id;
        $commentaire->auteur = $request->auteur;
        $commentaire->contenu = $request->contenu;
        $commentaire->user_id = 1;
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
            'auteur' => 'required',
            'contenu' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'auteur.required' => 'Desolé! Le champ auteur est obligatoire',
            'contenu.required' => 'Desolé! Le champ contenu est obligatoire',
        ];
    }

    public function update_traitement(Request $request)
    {
        $request->validate($this->rules(), $this->messages());

        $commentaires = Commentaires::find($request->id);
        $commentaires->id = $request->id;
        $commentaires->auteur = $request->auteur;
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
