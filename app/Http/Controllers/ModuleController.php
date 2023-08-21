<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modules = Module::all();

        return response()->json([
            'modules' => $modules
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModuleRequest $request)
    {
        $module = Module::create($request->all());

        return response()->json([
            'message' => "Module créé avec succés!",
            'Module' => $module
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
            $module = Module::findOrFail($id);
            return response()->json($module, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModuleRequest $request,$id)
    {
        $donnees= $request->all();
        $module= Module::findOrfail($id);
        $module->update($donnees);
        return response()->json([
            'status' => true,
            'message' => "Module modifié avec succes!",
            'module' => $module
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return response()->json([
            'status' => true,
            'message' => "Module supprimé!",
        ], 200);
    }
}
