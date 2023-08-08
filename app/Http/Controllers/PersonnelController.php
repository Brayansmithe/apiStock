<?php

namespace App\Http\Controllers;

use App\Models\personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnel=personnel::all();
        if($personnel!= Null){
            return $personnel;
        }else{
            return reponse()->json([
                'message'=>'aucun personnel enregistre'
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
            'nomPersonnel'=>'required|max:255',
            'prenomPersonnel'=>'required|max:255',
            'lieuFonction'=>'required|max:255'

        ],
        [

        'nomPersonnel'=>'veillez remplire tout les champs',
        
        ]);



        $personnel=new personnel;
        $personnel->nomPersonnel=$request->nomPersonnel;
        $personnel->prenomPersonnel=$request->prenomPersonnel;
        $personnel->lieuFonction=$request->lieuFonction;
        $personnel->telPersonnel=$request->telPersonnel;
        $personnel->mdpPersonnel=$request->mdpPersonnel;
        $personnel->emailPersonnel=$request->emailPersonnel;

        $personnel->save();

        return response()->json([
            'message'=>'personnel ajouter avec succes'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $personnel=personnel::find($id);
        if($personnel){
            return $personnel;
        }else{
            return response()->json([
                'message'=>'le personnel n existe pas dans votre entreprise'
            ]);
        }
    }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(personnel $personnel)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, $id)
        {



        $personnel=personnel::find($id);
        if($personnel){

            $personnel->nomPersonnel=$request->nomPersonnel;
            $personnel->prenomPersonnel=$request->prenomPersonnel;
            $personnel->lieuFonction=$request->lieuFonction;
            $personnel->telPersonnel=$request->telPersonnel;
            $personnel->mdpPersonnel=$request->mdpPersonnel;
            $personnel->emailPersonnel=$request->emailPersonnel;
            $personnel->update();
            return response()->json([
                'message'=>'le personnel a ete modifier avec succes'
            ]);
        }else{
            return response()->json([
                'message'=>'le personnel n existe pas dans votre entreprise'
            ]);
        }
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy($id)
        {
            //
            $personnel=personnel::find($id);
            if($personnel){
               
                $personnel->delete();
                return response()->json([
                    'message'=>'suppresion avec succes'
                ]);
            }else{  
                return response()->json([
                    'message'=>'aucune perso$personnel ne correspond a cet id,,,'
                ]);
            }
        }
}

