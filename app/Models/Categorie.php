<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    /**
     * Retourne toutes les notes associées à la catégorie
     *
     * @return HasMany
     */
    public function notes() {
        return $this->hasMany(Note::class);
    }
}
