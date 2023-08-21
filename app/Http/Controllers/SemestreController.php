<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSemestreRequest;
use App\Http\Requests\UpdateSemestreRequest;
use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semestres = Semestre::all();

        return response()->json([
            'Semestres' => $semestres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSemestreRequest $request)
    {
        $semestre = Semestre::create($request->all());

        return response()->json([
            'message' => "Semestre créé avec succés!",
            'semestre' => $semestre
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $semestre = Semestre::findOrFail($id);
        return response()->json($semestre, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemestreRequest $request,$id)
    {
        $donnees= $request->all();
        $semestre= Semestre::findOrfail($id);
        $semestre->update($donnees);
        return response()->json([
            'status' => true,
            'message' => "Semestre modifié avec succes!",
            'module' => $semestre
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $semestre = Semestre::findOrFail($id);
        $semestre->delete();
        return response()->json([
            'status' => true,
            'message' => "Semestre supprimé!",
        ], 200);
    }
}
