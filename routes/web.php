<?php

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
