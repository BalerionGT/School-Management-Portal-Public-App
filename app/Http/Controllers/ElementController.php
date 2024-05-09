<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Module;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ElementController extends Controller
{
    public function index(Request $request)
    {

        $chef = Chef::where('id', Auth::id())->first(); // Retrieve the chef from the chefs_filieres table based on the currently authenticated user's ID

        if ($chef) {

            $filiere_id = $chef->fillière; // Retrieve the filière ID from the chef

            $module = Module::where('nom_module', $request->module)
                ->whereHas('Fillière', function ($query) use ($filiere_id) {
                    $query->where('fillière_id', $filiere_id);
                })
                ->where('year', $request->year)
                ->first();

            $nom_module = $module->nom_module;
            $year = $request->year;

            if ($module) {

                $liste_elements = Element::where('module_id', $module->id)
                    ->get();


                $chef = Chef::find(Auth::id());
                $modules = DB::table('modules')
                    ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
                    ->where('fillières_modules.fillière_id', $chef->fillière)
                    ->select('*')
                    ->get();

                return view('Elements', compact('liste_elements', 'nom_module', 'year', 'modules'));
            } else {
                // Handle the case when the module is not found
                return redirect()->back()->with('error', 'Le module spécifié n\'existe pas pour cette filière.');
            }
        } else {
            // Handle the case when the chef is not found
            return redirect()->back()->with('error', 'Chef de filière introuvable.');
        }
    }

    public function create()
    {
        $chef = Chef::find(Auth::id());
        $modules = DB::table('modules')
            ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
            ->where('fillières_modules.fillière_id', $chef->fillière)
            ->select('*')
            ->get();


        return view("createelement", compact('modules'));
    }
    public function ajouter(Request $request)
    {
        $request->validate([
            "nom_elt" => "required",
            "semestre" => "required",
            "période" => "required",
            "description" => "required",
            "module" => "required"
        ]);

        Element::create([
            "nom_elt" => $request->nom_elt,
            "semestre" => $request->semestre,
            "période" => $request->période,
            "description" => $request->description,
            "module_id" => $request->module
        ]);


        return back()->with("success", "Element ajouté avec succès!");
    }
    public function supprimer(Element $element)
    {
        $element->delete();
        
        return back()->with("successDelete", "Element supprimé avec succès !");
    }

    public function update(Element $element, Request $request)
    { 
        $request->validate([
            "nom_elt" => "required",
            "semestre" => "required",
            "période" => "required",
            "description" => "required",
            "module" => "required"
        ]);

        $element->update([
            "nom_elt" => $request->nom_elt,
            "semestre" => $request->semestre,
            "période" => $request->période,
            "description" => $request->description,
            "module_id" => $request->module
        ]);

        return back()->with("successUpdate", "Element modifié avec succès!");
    }
    
        public function edit(Element $element)
        {
    
            $module = DB::table('modules')
                ->where('id', $element->module_id)
                ->select('*')
                ->get();
    
            $chef = Chef::find(Auth::id());
            $modules = DB::table('modules')
                ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
                ->where('fillières_modules.fillière_id', $chef->fillière)
                ->select('*')
                ->get();
    
            return view("editelement", compact("element", "modules", "module"));
        }
    }


