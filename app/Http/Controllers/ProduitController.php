<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\str;

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
            'nomProduit'=>'required',
            'prixProduit'=>'required',
            'qteProduit'=>'required',
            //'imageProduit'=>'required',
            'nomBoutique'=>'required',
           
            
            
                ],
            [
                'message'=>'veillez remplire tous les champs svp',
                
            ]
        );

        try {
            $imageNane = str::random().".".$request->imageProduit->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('imageProduit',$request->imageProduit,$imageNane);
            //$path= $request->imageProduit->storeAs('imageProduit',$imageNane,'public');
            produit::create($request->post()+['imageProduit'=>'imageProduit'.'/'. $imageNane]);
            return response()->json([
                'message'=>'produit cree avec succes'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>'un probleme est survenu lors de la creation du produit '.$th
                
            ]);
        }
/* 
        $produit=new produit;
        $produit->nomproduit = $request->nomproduit;
        $produit->prixProduit = $request->prixProduit;
        $produit->qteProduit = $request->qteProduit;
        $produit->imageProduit = $request->imageProduit;
        $produit->nomBoutique = $request->nomBoutique;
        $produit->save();
        return response()->json([
            'message'=>'produit cree avec succes'
        ]); */
    }
    

    /**
     * Display the specified resource.
     */
    public function show($idProduit)
    {
       $produit=produit::find($idProduit);
       if($produit){
        return $produit;

       }else{
        return response()->json([
            'message'=>'aucun produit trouver'
        ]);
       }
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomProduit'=>'required',
            'prixProduit'=>'required',
            'qteProduit'=>'required',
            //'imageProduit'=>'required',
            'nomBoutique'=>'required',
           
            
            
                ],
            [
                'message'=>'veillez remplire tous les champs svp',
                
            ]
        );

        try {
            $produit=produit::find($id);

            if($produit){

                if($request->imageProduit){
                    $exist = Storage::disk('public')->exists("imageProduit/{$produit->imageProduit}");
                    if($exists){
                        storage::disk('public')->delete("imageProduit/{$produit->imageProduit}");
                    }

                    
                    $imageNane = str::random().".".$request->imageProduit->getClientOriginalExtension();
                    //Storage::disk('public')->putFileAs('imageProduit',$request->imageProduit,$imageNane);
                    $path= $request->imageProduit->storeAs('imageProduit',$imageNane,'public');
                    $produit->fill($request->post())->update();
                    $produit->imageProduit = $path;
                    $produit->save();

                    return response()->json([
                        'message'=>'produit mise a jour avec succes'
                    ]);

                }else{
                    $produit->fill($request->post())->update();
                    return response()->json([
                        'message'=>'produit mise a jour avec succes'
                    ]);
                }
            }else{
                return response()->json([
                    'message'=>'produit mise a jour avec succes'
                ]);
            }   
        
    }catch (\Throwable $th) {
           return $th;
        }

    }
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $produit=produit::find($id);
        if($produit){
          $exists = Storage::disk('public')->exists("imageProduit/{$produit->imageProduit}");
            if($exists){
                storage::disk('public')->delete("imageProduit/{$produit->imageProduit}");
            }
          $produit->delete();

          return response()->json([
            "message"=>"produit suprimer avec succes"
          ]);
        }else{
            return response()->json([
                "message"=>"aucun id ne correspond a cette id"
            ]);
        }
    }
}
