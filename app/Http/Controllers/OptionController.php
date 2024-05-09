<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Fillière;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OptionController extends Controller
{
    public function index()
    {
        $liste_options = Fillière::orderBy("nom", "asc")->paginate(8);
    
        return view('Options', compact("liste_options"));
    }
    
    public function create()
    {
        return view("createOption");
    }
    public function ajouter(Request $request)
    {
        $request->validate([
            "nom"=>"required"
        ]);
    
        Fillière::create([
            "nom"=>$request->nom
        ]);
        return back()->with("success","Fillière ajouté avec succè!");
    }
    public function supprimer(Fillière $option)
    {
        $option->delete();
        return back()->with("successDelete", "Fillière supprimé avec succè!");
    }
    public function update(Fillière $option, Request $request)
    {
        $request->validate([
            "nom"=>"required"
        ]);
         
        $option->update([
            "nom" => $request->nom        
        ]);
        return back()->with("successUpdate", "Fillière modifié avec succès!");
    }
    public function edit(Fillière $option)
    {
        return view("editoption",compact("option"));
    }

}
