<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
    use HasFactory;

    /**
     * Retourne toutes les notes associées au sujet
     *
     * @return BelongsToMany
     */
    public function notes() {
        return $this->belongsToMany(Note::class);
    }
}
