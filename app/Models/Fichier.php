<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use HasFactory;

    /**
     * Retourne tous les notes associées à la catégorie
     *
     * @return HasMany
     */
    public function note() {
        return $this->belongsTo(Note::class);
    }
}
