<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProduitController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('listeMarket',[BoutiqueController::class,'index']);
Route::post('createMarket',[BoutiqueController::class,'store']);
Route::get('searchMarket/{id}',[BoutiqueController::class,'show']);
Route::put('updateMarket/{id}',[BoutiqueController::class,'update']);
Route::delete('suppresion/{id}',[BoutiqueController::class,'destroy']);


// les routes de personnelControler

Route::get('listePersonnel',[PersonnelController::class,'index']);
Route::post('createPersonnel',[PersonnelController::class,'store']);
Route::get('SearchPersonnel/{idPersonnel}',[PersonnelController::class,'show']);
Route::put('updatePersonnel/{idPersonnel}',[PersonnelController::class,'update']);
Route::delete('suprimerPersonnel/{idPersonnel}',[PersonnelController::class,'destroy']);



//route pour le controler produit

Route::get('listeProduit',[ProduitController::class,'index']);
Route::post('createProduit',[ProduitController::class,'store']);
Route::get('SearchProduit/{idProduit}',[ProduitController::class,'show']);
Route::put('updateProduit/{idProduit}',[ProduitController::class,'update']);
Route::delete('supprimerProduit/{idProduit}',[ProduitController::class,'destroy']);