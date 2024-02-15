<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Note;
use App\Models\Sujet;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**************
         * UTILISATEURS
         **************/

        User::factory()->create([
            "prenom" => "Eric",
            "nom" => "Gagné",
            "email" => "erga@gmail.com"
        ]);

        // Ajout d'utilisateurs fictifs
        \App\Models\User::factory(9)->create();


        /**************
         * CATÉGORIES
         **************/

        // Ajout de catégories (préexistantes, dans un fichier /storage/app/data)
        $categories = json_decode(
            file_get_contents(storage_path("app/data/categories.json"))
        );

        // Chaque catégorie lue dans le fichier est insérée dans la BDD (à l'aide du modèle)
        foreach ($categories as $categories) {
            Categorie::insert([
                "nom" => $categories->nom,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }

        /**************
         * SUJETS
         **************/

        // Ajout de sujets (préexistants, dans un fichier /storage/app/data)
        $sujets = json_decode(
            file_get_contents(storage_path("app/data/sujets.json"))
        );

        // Chaque sujet lu dans le fichier est inséré dans la BDD (à l'aide du modèle)
        foreach ($sujets as $sujet) {
            Sujet::insert([
                "nom" => $sujet->nom,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }

        /**************
         * NOTES
         **************/

        // Ajout de notes fictives
        $notes = Note::factory(50)->create();

        /**************
         * NOTE-SUJETS
         **************/
        foreach($notes as $note){

        }

        // Ajout de sujets aux notes
        $notes->each(function ($note) {
            // Un nombre variable de sujets est récupéré
            $sujets = Sujet::inRandomOrder()
            ->select('id')
            ->take(rand(1, 3))
            ->get();

        // La méthode ->attach peut accepter un array de id à rattacher à la note
        // C'est pourquoi seulement la colonne 'id' a été sélectionné précédemment
        $note->sujets()->attach($sujets);
        });
    }
}
