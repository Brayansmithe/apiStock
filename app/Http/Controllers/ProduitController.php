<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $produit=produit::all();
        if($produit!= Null){
            return $produit;
        }else{
            return response()->json([
                'message'=>'aucun produit enregistre'
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomProduit'=>'required|max:255',
            'prixProduit'=>'required|max:255',
            'qteProduit'=>'required|max:255',
            'imageProduit'=>'required|max:255',
            'boutique'=>'required|max:255',
           
            
            
                ],
            [
                'message'=>'veillez remplire tous les champs svp',
                
            ]
        );
        $produit=new produit;
        $produit->nomproduit = $request->nomproduit;
        $produit->prixProduit = $request->prixProduit;
        $produit->qteProduit = $request->qteProduit;
        $produit->imageProduit = $request->imageProduit;
        $produit->nomBoutique = $request->nomBoutique;
        $produit->save();
        return response()->json([
            'message'=>'produit cree avec succes'
        ]);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($idBoutique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produit $produit)
    {
        //
    }
}
