<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Affiche la liste des notes de cours
     *
     * @return View
     */
    public function index() {
        return view('notes.index', [
            "notes" => auth()->user()->notes
        ]);
    }

    /**
     * Affiche le formulaire d'ajout
     *
     * @return View
     */
    public function create() {
        return view('notes.create', [
            "categories" => Categorie::orderBy('nom', 'asc')
                                ->get()
        ]);
    }

    /**
     * Traite l'ajout
     *
     * @param Request $request
     * @return RedirectResponse
    */
    public function store(Request $request) {
        // Valider
        $valides = $request->validate([
            "titre" => "nullable|min:4|max:150",
            "categorie_id" => "required|numeric|exists:categories,id"
        ], [
            "titre.max" => "Le titre doit avoir un maximum de :max caractères",
            "titre.min" => "Le titre doit avoir un minimum de :min caractères",
            "categorie_id.required" => "La catégorie est obligatoire",
            "categorie_id.numeric" => "La catégorie doit être numérique",
            "categorie_id.exists" => "La catégorie fournie n'existe pas dans nos données"
        ]);

        // Ajouter à la BDD
        $note = new Note; // $note contient un objet "vide" du modèle (équivalent à une nouvelle entrée dans la table)
        $note->titre = $valides["titre"] ?? now();
        $note->texte = ""; // Le texte est initialisé à du texte vide pour commencer (pourrait être null)
        $note->user_id = auth()->user()->id;
        $note->categorie_id = $valides["categorie_id"];
        $note->save();

        // Rediriger
        return redirect()
                ->route('notes.index')
                ->with('succes', "La note a été ajoutée avec succès!");
    }

    /**
     * Affiche le formulaire de modification
     *
     * @param int $id Id de la note à modifier
     * @return View
     */
    public function edit($id) {
        return view('notes.edit', [
            "note" => Note::findOrFail($id),
            "categories" => Categorie::orderBy('nom', 'asc')
                                ->get()
        ]);
    }

    /**
     * Traite la modification
     *
     * @param Request $request Objet qui contient tous les champs reçus dans la requête
     * @return RedirectResponse
     */
    public function update(Request $request) {
        // Valider
        $valides = $request->validate([
            "id" => "required",
            "titre" => "nullable|min:4|max:150",
            "categorie_id" => "required|numeric|exists:categories,id",
            "texte" => "nullable"
        ], [
            "id.required" => "L'id de la note est obligatoire",
            "titre.max" => "Le titre doit avoir un maximum de :max caractères",
            "titre.min" => "Le titre doit avoir un minimum de :min caractères",
            "categorie_id.required" => "La catégorie est obligatoire",
            "categorie_id.numeric" => "La catégorie doit être numérique",
            "categorie_id.exists" => "La catégorie fournie n'existe pas dans nos données"
        ]);

        // Récupération de la note à modifier, suivi de la modification et sauvegarde
        $note = Note::findOrFail($valides["id"]);
        $note->titre = $valides["titre"];
        $note->texte = $valides["texte"];
        $note->user_id = auth()->id();
        $note->categorie_id = $valides["categorie_id"];
        $note->save();

        // Rediriger
        return redirect()
                ->route('notes.index')
                ->with('succes', "La note a été modifiée avec succès!");
    }

    /**
     * Traite la suppression
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request) {
        Note::destroy($request->id);

        return redirect()->route('notes.index')
                ->with('succes', "La note a été supprimée!");
    }
}
