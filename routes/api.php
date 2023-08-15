<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\FactureController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middlfile:///home/brayan/Bureau/App3/deskapp2-master/index.html
eware group. Make something great!
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




//creation des routes pour le controllers facture

Route::get('listeFacture',[FactureController::class,'index']);  //lister les factures 
Route::post('creeFacture',[FactureController::class,'store']);
Route::get('searchFacture/{idFacture}',[FactureController::class,'show']);
Route::put('updateFacture/{idFacture}',[FactureController::class,'update']);
Route::delete('supprimerFacture/{idFacture}',[FactureController::class,'destroy']);