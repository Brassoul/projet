<?php

use App\Http\Controllers\commentaireController;
use App\Http\Controllers\Controllercategorie;
use App\Http\Controllers\ProduitController;
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

Route::get('/',[ ProduitController::class,'userViews'])->name('produits.userViews');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/test', function () {
    return view('layout/layout');
});
// Route::get('/index', function () {
//     return view('index');
// });
Route::get('/user', function () {
    return view('user');
});
Route::get('produits/create',[ ProduitController::class,'create'])->name('produits.create');
Route::post('produits/store',[ ProduitController::class,'store'])->name('produits.store');
Route::get('produits/show/{id}',[ ProduitController::class,'show'])->name('produits.show');
Route::get('produits/edit/{id}',[ ProduitController::class,'edit'])->name('produits.edit');
Route::put('produits/update/{id}',[ ProduitController::class,'update'])->name('produits.update');
Route::delete('produits/delete/{id}',[ ProduitController::class,'delete'])->name('produits.delete');

Route::get('categorie',[ Controllercategorie::class,'index'])->name('categorie.index');
Route::get('categorie/create',[ Controllercategorie::class,'create'])->name('categorie.create');
Route::post('categorie/store',[ Controllercategorie::class,'store'])->name('categorie.store');
Route::get('categorie/show/{id}',[ Controllercategorie::class,'show'])->name('categorie.show');
Route::get('categorie/edit/{id}',[ Controllercategorie::class,'edit'])->name('categorie.edit');
Route::put('categorie/update/{id}',[ Controllercategorie::class,'update'])->name('categorie.update');
Route::delete('categorie/delete/{id}',[ Controllercategorie::class,'delete'])->name('categorie.delete');


Route::get('commentaire/show/{id}',[ commentaireController::class,'show'])->name('commentaire.show');
Route::get('commentaire/edit/{id}',[ commentaireController::class,'edit'])->name('commentaire.edit');
Route::put('commentaire/update/{id}',[ commentaireController::class,'update'])->name('commentaire.update');
Route::delete('commentaire/delete/{id}',[ commentaireController::class,'delete'])->name('commentaire.delete');

require __DIR__.'/auth.php';
