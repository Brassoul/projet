<?php

use App\Http\Controllers\commentaireController;
use App\Http\Controllers\Controllercathegorie;
use App\Http\Controllers\ProduitController;
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
Route::get('/test', function () {
    return view('layout/layout');
});
// Route::get('/index', function () {
//     return view('index');
// });
Route::get('/user', function () {
    return view('user');
});
Route::get('produits',[ ProduitController::class,'index'])->name('produits.index');
Route::get('produits/create',[ ProduitController::class,'create'])->name('produits.create');
Route::post('produits/store',[ ProduitController::class,'store'])->name('produits.store');
Route::get('produits/show/{id}',[ ProduitController::class,'show'])->name('produits.show');
Route::get('produits/edit/{id}',[ ProduitController::class,'edit'])->name('produits.edit');
Route::put('produits/update/{id}',[ ProduitController::class,'update'])->name('produits.update');
Route::delete('produits/delete/{id}',[ ProduitController::class,'delete'])->name('produits.delete');

Route::get('cathegorie',[ Controllercathegorie::class,'index'])->name('cathegorie.index');
Route::get('cathegorie/create',[ Controllercathegorie::class,'create'])->name('cathegorie.create');
Route::post('cathegorie/store',[ Controllercathegorie::class,'store'])->name('cathegorie.store');
Route::get('cathegorie/show/{id}',[ Controllercathegorie::class,'show'])->name('cathegorie.show');
Route::get('cathegorie/edit/{id}',[ Controllercathegorie::class,'edit'])->name('cathegorie.edit');
Route::put('cathegorie/update/{id}',[ Controllercathegorie::class,'update'])->name('cathegorie.update');
Route::delete('cathegorie/delete/{id}',[ Controllercathegorie::class,'delete'])->name('cathegorie.delete');

Route::get('commentaire',[ commentaireController::class,'index'])->name('commentaire.index');
Route::get('commentaire/create',[ commentaireController::class,'create'])->name('commentaire.create');
Route::post('commentaire/store',[ commentaireController::class,'store'])->name('commentaire.store');
Route::get('commentaire/show/{id}',[ commentaireController::class,'show'])->name('commentaire.show');
Route::get('commentaire/edit/{id}',[ commentaireController::class,'edit'])->name('commentaire.edit');
Route::put('commentaire/update/{id}',[ commentaireController::class,'update'])->name('commentaire.update');
Route::delete('commentaire/delete/{id}',[ commentaireController::class,'delete'])->name('commentaire.delete');
