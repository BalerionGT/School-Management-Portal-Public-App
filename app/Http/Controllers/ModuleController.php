<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function index()
    {

       $chefFilliere = Chef::find(Auth::user()->id);
       $filiere = $chefFilliere->fillière;


        $liste_modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'module_id')
        ->where('fillière_id', [$filiere])
        ->select('*')
        ->get();

        $chef = Chef::find(Auth::id());
        $modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
        ->where('fillières_modules.fillière_id', $chef->fillière)
        ->select('*')
        ->get();

     
        return view('Modules', compact("liste_modules","filiere", "modules"));
    }
    
    public function create()
    {
        $fillières = DB::table('fillières')
        ->select('*')
        ->get();

        $chef = Chef::find(Auth::id());
        $modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
        ->where('fillières_modules.fillière_id', $chef->fillière)
        ->select('*')
        ->get();

        return view("createmodule", compact('modules','fillières'));
    }

    
    public function ajouter(Request $request)
    {
        $filliereId = $request->year;
        $request->validate([
            "nom_module" => "required",
            "year" => "required",
            "semestre" => "required",
            "description" => "required",
            "fillière" =>"required"
        ]);

        $module = Module::create([
            'nom_module' => $request->nom_module,
            'year' => $request->year,
            'semestre' => $request->semestre,
            'description' => $request->description,
        ]);

        DB::table('fillières_modules')->insert([
            'fillière_id' => $request->fillière,
            'module_id' => $module->id
        ]);
        return back()->with("success","Module ajouté avec succè!");
    }




    public function supprimer(Module $module)
    {
        // Il faut tous d'abord supprimer les élements de ce module
        $element = DB::table('elements')
        ->where('module_id',$module->id)
        ->delete();

        $module->delete();

        return back()->with("successDelete", "Module supprimé avec succè!");
    }






    public function update(Module $module, Request $request)
    {
        $request->validate([
            "nom_module"=>"required",
            "year"=>"required",
            "semestre"=>"required",
            "description"=>"required"
        ]);
    
        $module->update([
            'nom_module' => $request->nom_module,
            'year' => $request->year,
            'semestre' => $request->semestre,
            'description' => $request->description       
        ]);

        return back()->with("successUpdate", "Module modifié avec succès!");
    }





    public function edit(Module $module)
    {
        $chef = Chef::find(Auth::id());
        $modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
        ->where('fillières_modules.fillière_id', $chef->fillière)
        ->select('*')
        ->get();

        return view("editmodule",compact("module","modules"));
    }

    



    public function getModules(Request $request)
{
    $filliereId = $request->input('filliereId');

    $modules = DB::table('fillières_modules')
        ->join('modules', 'fillières_modules.module_id', '=', 'modules.id')
        ->where('fillières_modules.fillière_id', [$filliereId])
        ->select('modules.nom_module')
        ->get();


    return response()->json($modules);
}
}
