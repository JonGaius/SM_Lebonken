<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [App\Http\Controllers\API\Article\ArticleController::class, 'login']);
    Route::post('logout',  [App\Http\Controllers\API\Article\ArticleController::class, 'logout']);
    Route::post('refresh',  [App\Http\Controllers\API\Article\ArticleController::class, 'refresh']);
    Route::post('user',  [App\Http\Controllers\API\Article\ArticleController::class, 'user']);

});


Route::apiResource('articles',App\Http\Controllers\API\Article\ArticleController::class);
Route::apiResource('categories',App\Http\Controllers\API\Article\CategoryController::class);
Route::apiResource('subcategories',App\Http\Controllers\API\Article\SubcategoryController::class);