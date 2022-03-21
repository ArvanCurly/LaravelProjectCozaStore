<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produits',ProduitController::class);

Route::delete('produits/force/{produit}', [ProduitController::class, 'forceDestroy'])->name('produits.force.destroy');
Route::put('produits/restore/{produit}', [ProduitController::class, 'restore'])->name('produits.restore');
Route::get('category/{slug}/produits', [ProduitController::class, 'index'])->name('produits.category');


Route::resource('categories',CategoryController::class);

Route::delete('categories/force/{categorie}', [CategoryController::class, 'forceDestroy'])->name('categories.force.destroy');
Route::put('categories/restore/{categorie}', [CategoryController::class, 'restore'])->name('categories.restore');


Route::resource('types',TypeController::class);

Route::delete('types/force/{type}', [TypeController::class, 'forceDestroy'])->name('types.force.destroy');
Route::put('types/restore/{type}', [TypeController::class, 'restore'])->name('types.restore');
