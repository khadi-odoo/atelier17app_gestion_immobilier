<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteFileRegistrar;
use App\Http\Middleware;
use App\Http\Middleware\IsAdminMiddleware;

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
