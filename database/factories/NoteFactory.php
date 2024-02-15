<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            // Le titre correspond à du texte ou à un timestamp variable
            "titre" => rand(1,2) == 1 ? ucfirst($this->faker->sentence()) :
                                        Carbon::now()->subDays(rand(1, 10))->subHours(rand(1,12)),
            "texte" => $this->faker->paragraphs(3, true),
            // Un user au hasard est associé à la note
            "user_id" => User::inRandomOrder()->first(),
            // Une catégorie est associée à la note
            "categorie_id" => Categorie::inRandomOrder()->first()
        ];
    }
}
