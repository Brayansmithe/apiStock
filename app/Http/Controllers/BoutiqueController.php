<?php

namespace App\Http\Controllers;

use App\Models\boutique;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $boutique=boutique::all();
        if($boutique!= Null){
            return $boutique;
        }else{
            return response()->json([
                'message'=>'aucune boutique enregistre'
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
            'nomBoutique'=>'required|max:255',
            'lieuBoutique'=>'required|max:255',
            
        ],
    [
        'nomBoutique'=>'le nom de la boutique est obligatoire',
        'lieuBoutique'=>'le nom de la boutique est obligatoire'
    ]
);
        $boutique=new boutique;
        $boutique->nomBoutique = $request->nomBoutique;
        $boutique->lieuBoutique = $request->lieuBoutique;
        $boutique->save();
        return response()->json([
            'message'=>'boutique cree avec succes'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $boutique=boutique::find($id);
        if($boutique){
            return $boutique;

        }else{
            return response()->json([
                'message'=>'la boutique n exite pas...'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(boutique $boutique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $id,Request $request)
    {
        
        $request->validate([
            'nomBoutique'=>'required|max:255',
            'lieuBoutique'=>'required|max:255',
            
        ],
    [
        'nomBoutique'=>'le nom de la boutique est obligatoire',
        'lieuBoutique'=>'le lieu de la boutique est obligatoire'
    ]
);
   

        $boutique=boutique::find($id);
        if($boutique){
            $boutique->nomBoutique=$request->nomBoutique;
            $boutique->lieuBoutique=$request->lieuBoutique;
            $boutique->update();
            return response()->json([
                'message'=>'mise a jour avec succes'
            ]);
        }else{
            return response()->json([
                'message'=>'aucune boutique ne corespond a cet id,,,'
            ]);
           
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,Request $request)
    {
        $boutique=boutique::find($id);
        if($boutique){
           
            $boutique->delete();
            return response()->json([
                'message'=>'suppresion avec succes'
            ]);
        }else{
            return response()->json([
                'message'=>'aucune boutique ne correspond a cet id,,,'
            ]);
        }
    }
}