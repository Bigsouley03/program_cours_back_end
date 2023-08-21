<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClasseRequest;
use App\Models\Classe;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\Module;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::all();
        return response()->json([
            'classes' => $classes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreClasseRequest $request)
    {
        $classe = Classe::create($request->all());
        $classe->save();

        return response()->json([
            'message' => "La classe a ete créé avec succes",
            'classe' => $classe
        ], 200);


    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $classe = Classe::with('module_id')->find($id);
        if (!$classe){
            return response()->json([
                'message'=> 'Classe non trouvé'
            ],404);
        }
        return response()->json($classe, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, $id)
    {
        $donnees= $request->all();
        $classe= Classe::findOrfail($id);
        $classe->update($donnees);

        return response()->json([
            'status' => true,
            'message' => "La classe a ete modifiée avec succés",
            'classe' => $classe
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classe = Classe::find($id);

        if (!$classe) {
            return response()->json(['message' => 'Classe introuvable'], 404);
        }

        // Supprimer l'article
        $classe->delete();

        return response()->json(['message' => 'Classe supprimé avec succès'], 200);
    }
}
