<?php

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Http\Controllers\LigneCommandeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('scategories', ScategorieController::class);
});
Route::get(
    '/scat/{idcat}',
    [ScategorieController::class, 'showSCategorieByCAT']
);
Route::middleware('api')->group(function () {
    Route::resource('articles', ArticleController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('clients', ClientController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('commandes', CommandeController::class);
});
Route::get(
    '/comcli/{idcli}',
    [CommandeController::class, 'showCommandeByCLI']
);
Route::middleware('api')->group(function () {
    Route::resource('ligneCommandes', LigneCommandeController::class);
});
Route::get(
    '/ligcom/{idcom}',
    [LigneCommandeController::class, 'showLigneCommandeByCOM']
);
Route::get(
    '/ligcomart/{idart}',
    [LigneCommandeController::class, 'showLigneCommandeByART']
);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
