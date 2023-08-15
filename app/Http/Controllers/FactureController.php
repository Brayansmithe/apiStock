<?php

namespace App\Http\Controllers;

use App\Models\facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ici on liste  tout les factures deja enregistre dans la BD
        $facture=facture::all();
        if($facture!= Null){
            return $facture;
        }else{
            return response()->json([
                'message'=>'aucune facture enregistre'
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
            'nomProduit'=>'required',
            'qteProduit'=>'required',
            'prixProduit'=>'required',
            'nomBoutique'=>'required',
            
        ],
    [
        'nomBoutique'=>'le nom de la boutique est obligatoire',
        'lieuBoutique'=>'le nom de la boutique est obligatoire'
    ]
);
        $facture=new facture;
        $facture->nomFacture = $request->nomFacture;
        $facture->qteProduit = $request->qteProduit;
        $facture->prixProduit = $request->prixProduit;
        $facture->nomBoutique = $request->nomBoutique;
        $facture->save();
        return response()->json([
            'message'=>'boutique cree avec succes'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(facture $facture)
    {
        //
    }
}
