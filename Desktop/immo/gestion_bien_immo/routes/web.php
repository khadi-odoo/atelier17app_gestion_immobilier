<?php

use App\Http\Controllers\CommentairesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/comment', [CommentairesController::class, 'commenter']);
Route::get('/comment_liste', [CommentairesController::class, 'liste_commentaire']);
Route::post('/ajout_commentaire', [CommentairesController::class, 'commentaire_ajouter']);

Route::get('/modif_commentaire/{id}', [CommentairesController::class, 'update']);
Route::post('/update/traitement', [CommentairesController::class, 'update_traitement']);



Route::delete('/delete_commentaire/{id}', [CommentairesController::class, 'destroy']);









Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
