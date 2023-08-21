<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoursEnrollerRequest;
use App\Http\Requests\UpdateCoursEnrollerRequest;
use App\Models\CoursEnroller;
use Illuminate\Http\Request;

class CoursEnrollerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coursEnrollers = CoursEnroller::all();
        return response()->json([
            'cours' => $coursEnrollers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoursEnrollerRequest $request)
    {
        $coursEnroller = CoursEnroller::create($request->all());
        $coursEnroller->save();

        return response()->json([
            'message' => "Le cours a été enrolé avec succes",
            'classe' => $coursEnroller
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coursesE = CoursEnroller::with('module_id', 'user_id','classe_id')->find($id);



        if (!$coursesE){
            return response()->json([
                'message'=> 'Cours non trouvé'
            ],404);
        }
        return response()->json($coursesE, 200);

    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoursEnrollerRequest $request, $id)
    {
        $courses = CoursEnroller::find($id);
        if (!$courses) {
            return response()->json(['message' => 'Cours introuvable'], 404);
        }
        $donnees= $request->all();
        $module= CoursEnroller::findOrfail($id);
        $module->update($donnees);
        $courses->save();

        return response()->json([
            'message' => "Les données du cours ont été modifiée avec succés",
            'cours' => $courses
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $courses = CoursEnroller::find($id);

        if (!$courses) {
            return response()->json(['message' => 'Cours introuvable'], 404);
        }

        // Supprimer l'article
        $courses->delete();

        return response()->json(['message' => 'Cours supprimé avec succès'], 200);
    }

}
