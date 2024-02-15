<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    /**
     * Retourne la catégorie associée à la note
     *
     * @return BelongsTo
     */
    public function categorie() {
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Retourne l'usager associé à la note
     *
     * @return BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Retourne les fichiers associés à la note
     *
     * @return HasMany
     */
    public function fichiers() {
        return $this->hasMany(Fichier::class);
    }

    /**
     * Retourne les sujets associés à la note
     *
     * @return BelongsToMany
     */
    public function sujets() {
        return $this->belongsToMany(Sujet::class);
    }
}
