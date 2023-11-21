<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//use de bouh
use App\Http\Controllers\CommentairesController;

//use de ciré

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OptionController;
use \App\Http\Controllers\Admin\PropertyController;


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

//route de bouh

Route::get('/comment/{id}', [CommentairesController::class, 'commenter']);
Route::get('/comment_liste', [CommentairesController::class, 'liste_commentaire']);
Route::post('/ajout_commentaire/{id}', [CommentairesController::class, 'commentaire_ajouter']);

Route::get('/modif_commentaire/{id}', [CommentairesController::class, 'update']);
Route::post('/update/traitement', [CommentairesController::class, 'update_traitement']);

Route::delete('/delete_commentaire/{id}', [CommentairesController::class, 'destroy']);

// Route de ciré 

$idRegex =  '[0-9]+';
$slugRegex =  '[0-9a-z\-]+';
Route::get('/', [App\Http\Controllers\PropertyController::class, 'index'] ); 
Route::get('/biens', [App\Http\Controllers\PropertyController::class,  'index' ] )->name('property.index');        
Route::get('/biens/{slug}-{property}', [App\Http\Controllers\PropertyController::class,  'show' ] )->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex,
]);        

Route::post('/biens/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex
]);

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});


//Route de breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
