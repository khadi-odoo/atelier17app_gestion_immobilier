<?php

<<<<<<< HEAD
use Illuminate\Support\Facades\Route;
=======
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteFileRegistrar;
use App\Http\Middleware;
use App\Http\Middleware\IsAdminMiddleware;

//use de bouh
use App\Http\Controllers\CommentairesController;
//use de ciré

>>>>>>> develop
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\OptionController;
use \App\Http\Controllers\Admin\PropertyController;

<<<<<<< HEAD
=======

>>>>>>> develop
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

<<<<<<< HEAD
$idRegex =  '[0-9]+';
$slugRegex =  '[0-9a-z\-]+';
Route::get('/', [HomeController::class, 'index'] );

// Route::prefix('/biens')->controller('App\Http\Controllers\PropertyController')->group(function () {
//     Route::get('')
// });

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
=======


// Route de ciré 

// $idRegex =  '[0-9]+';
// $slugRegex =  '[0-9a-z\-]+';
Route::get('/', [App\Http\Controllers\PropertyController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->prefix('biens')->group( function(){

    $idRegex =  '[0-9]+';
    $slugRegex =  '[0-9a-z\-]+';
    Route::get('/', [App\Http\Controllers\PropertyController::class,  'index'])->name('property.index');
    Route::get('/{slug}-{property}', [App\Http\Controllers\PropertyController::class,  'show'])->name('property.show')->where([
        'property' => $idRegex,
        'slug' => $slugRegex,
    ]);
    Route::post('/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
        'property' => $idRegex
    ]);

} );

Route::middleware(['auth', 'verified'])->controller(CommentairesController::class)->group( function(){

    Route::get('/comment/{id}',  'commenter');
    Route::get('/comment_liste',  'liste_commentaire');
    Route::post('/ajout_commentaire/{id}',  'commentaire_ajouter');
    Route::get('/modif_commentaire/{id}',  'update');
    Route::post('/update/traitement',  'update_traitement');
    Route::delete('/delete_commentaire/{id}',  'destroy');
});




Route::middleware(['auth', 'verified', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
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



Route::get('/admin', function () {
    return view('test');
})->middleware(['isAdmin', 'verified'])->name('admin');


// Route::get('/admin', function () {
//     // Vérifie si l'utilisateur est autorisé à accéder à cette page
//     $this->middleware('isAdmin:admin');

//     // Affiche la page d'administration
//     return view('test');
// });
require __DIR__ . '/auth.php';
>>>>>>> develop
