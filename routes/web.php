<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/admin', function () {
    return view('auth.login');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/prod', [HomeController::class, 'prod'])->name('prod');

Route::get('prod/{produit}', [HomeController::class, 'detail'])->name('detail');


Route::get('contact', [ContactController::class, 'create'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact');

Route::get('/blog', function () {return view('frontend.blog');})->name('blog');
Route::get('/dblog', function () {return view('frontend.blog-detail');})->name('dblog');



Route::get('/about', function () {return view('frontend.about');})->name('about');
Route::get('/shoping', function () {return view('frontend.shoping-cart');})->name('shoping');





Route::group(['middleware' => ['auth:sanctum']] ,function() {


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

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



