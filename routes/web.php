<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Main route
Route::get('/', [App\Http\Controllers\FrontOffice\MainController::class, 'index'])->name('welcome');
Route::get('/les-boutiques', [App\Http\Controllers\FrontOffice\User\BoutiqueController::class, 'index'])->name('frontoffice.boutiques');
Route::get('/en-promos', [App\Http\Controllers\FrontOffice\Article\ArticlesController::class, 'solde'])->name('frontoffice.articles.solde');
Route::get('/les-categories', [App\Http\Controllers\FrontOffice\MainController::class, 'categorie'])->name('frontoffice.categorie');
Route::get('/categorie/{ref}', [App\Http\Controllers\FrontOffice\MainController::class, 'showCategorie'])->name('frontoffice.categorie.show');
Route::get('/annonce/{ref}', [App\Http\Controllers\FrontOffice\Article\ArticlesController::class, 'show'])->name('frontoffice.article.show');
Route::get('/boutique/{ref}', [App\Http\Controllers\FrontOffice\User\BoutiqueController::class, 'show'])->name('frontoffice.boutique.show');
Route::get('/vendeur/{ref}', [App\Http\Controllers\FrontOffice\User\UserController::class, 'show'])->name('frontoffice.user.show');
Route::get('/souscategorie/{ref}', [App\Http\Controllers\FrontOffice\MainController::class, 'showSubcategorie'])->name('frontoffice.subcategorie.show');

Route::get('/articles/subcategorie/{id}',  [App\Http\Controllers\BackOffice\Admin\Article\CategoriesController::class, 'fetchSubCategorie'])->name('fetch.subcategorie');
Route::get('/articles/subcategorie/attribute/{id}', [App\Http\Controllers\BackOffice\Admin\Article\CategoriesController::class, 'fetchSubCategorieAttribute'])->name('fetch.subcategorie.attributes');
Auth::routes();

//User route
Route::group(['prefix' => 'user'], function(){
    Route::get('/home', [App\Http\Controllers\BackOffice\User\User\UserController::class, 'index'])->name('user.home');
    Route::get('/profil', [App\Http\Controllers\BackOffice\User\User\UserController::class, 'show'])->name('user.show');
    Route::group(['prefix' => 'articles'], function(){
        Route::get('/', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'index'])->name('user.article.index');
        Route::get('/create', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'create'])->name('user.article.create');
        Route::post('/create', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'store'])->name('user.article.store');
        Route::get('/show/{ref}', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'show'])->name('user.article.show');
        Route::get('/edit/{ref}', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'edit'])->name('user.article.edit');
        Route::patch('/edit/{ref}', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'update'])->name('user.article.update');
        Route::patch('/transfer/{ref}', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'transfer'])->name('user.article.transferUpdate');
        Route::patch('/transfer', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'bigTransfer'])->name('user.article.bigtransfer');
        Route::patch('/online/{ref}', [App\Http\Controllers\BackOffice\User\User\ArticlesController::class, 'online'])->name('user.article.online');
    });
    Route::group(['prefix' => 'enseignes'], function(){
        Route::get('/', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'index'])->name('user.boutique');
        Route::get('/create', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'create'])->name('user.boutique.create');
    });
});

//Boutique route
Route::group(['prefix' => 'enseigne'], function(){

    Route::post('/create', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'store'])->name('boutique.store');
    Route::get('/show/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'show'])->name('boutique.show');
    Route::get('/edit/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'edit'])->name('boutique.edit');
    Route::get('/delete/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'destroy'])->name('boutique.destroy');
    Route::patch('/update-image/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'updateImage'])->name('boutique.updateImg');
    Route::patch('/update-info/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'updateInformation'])->name('boutique.updateInfo');
    Route::patch('/update-social-links/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\BoutiqueController::class, 'updateSocial'])->name('boutique.updatesocial');

    Route::group(['prefix' => 'articles'], function(){
        Route::get('/articles/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\ArticlesController::class, 'index'])->name('boutique.article.index');
        Route::get('/create/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\ArticlesController::class, 'create'])->name('boutique.article.create');
        Route::post('/redirect-create', [App\Http\Controllers\BackOffice\User\Boutique\ArticlesController::class, 'redirectToPage'])->name('boutique.article.redirect.create');
        Route::post('/create/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\ArticlesController::class, 'store'])->name('boutique.article.store');
        Route::get('/show/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\ArticlesController::class, 'show'])->name('boutique.article.show');
        Route::get('/edit/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\ArticlesController::class, 'edit'])->name('boutique.article.edit');
        Route::patch('/edit/{ref}', [App\Http\Controllers\BackOffice\User\Boutique\ArticlesController::class, 'update'])->name('boutique.article.update');
    });
});

// Global Article route
Route::group(['prefix' => 'articles'], function(){
    Route::patch('/update-images/{ref}',[App\Http\Controllers\BackOffice\User\Article\ArticlesController::class, 'updateImage'])->name('article.update.images');
    Route::patch('/update-info/{ref}',[App\Http\Controllers\BackOffice\User\Article\ArticlesController::class, 'updateInformation'])->name('article.update.information');
    Route::patch('/update-attribute/{ref}',[App\Http\Controllers\BackOffice\User\Article\ArticlesController::class, 'updateAttribute'])->name('article.update.attribut');
});