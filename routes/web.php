<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\EnregistrementController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;


/*****************
 * ACCUEIL
 */
Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');

/*****************
 * NOTES
 */
Route::get('/notes', [NoteController::class, 'index'])
    ->name('notes.index')
    ->middleware('auth');

// Affichage du formulaire d'ajout d'une note
Route::get('/notes/create', [NoteController::class, 'create'])
    ->name('notes.create')
    ->middleware('auth');

// Traitement du formulaire
Route::post('/notes', [NoteController::class, 'store'])
    ->name('notes.store')
    ->middleware('auth');

// Affichage du formulaire de modification d'une note
Route::get("/notes/edit/{id}", [NoteController::class, 'edit'])
    ->name('notes.edit')
    ->middleware('auth');

// Traitement du formulaire de modification
Route::post("/notes/update", [NoteController::class, 'update'])
    ->name('notes.update')
    ->middleware('auth');

Route::post("/notes/destroy", [NoteController::class, 'destroy'])
    ->name('notes.destroy')
    ->middleware('auth');

/******
 * CONNEXION ET ENREGISTREMENT
 */

Route::get("/connexion", [ConnexionController::class, 'create'])
    ->name('connexion.create')
    ->middleware('guest');

Route::post("/connexion", [ConnexionController::class, 'authentifier'])
    ->name('connexion.authentifier');

Route::post("/deconnexion", [ConnexionController::class, 'deconnecter'])
    ->name('deconnexion');

Route::get("/enregistrement",[EnregistrementController::class, 'create'])
    ->name('enregistrement.create');

Route::post("/enregistrement", [EnregistrementController::class, 'store'])
    ->name('enregistrement.store');
