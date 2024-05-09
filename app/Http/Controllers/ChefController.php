<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\User;
use App\Models\Fillière;
use App\Models\students;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChefController extends Controller
{
    public function index()
    {
        $liste_chefs = Chef::orderBy("nom", "asc")->paginate(8);
    
        return view('Chefs', compact("liste_chefs"));
    }
    
    public function supprimer(Chef $chef)
    {
        $user = User::find($chef->id);
        $user->update([
            'chef' => 0,
        ]);

        $prof = Professor::find($chef->id);
        $prof->update([
            'chef' => 0,
        ]);

        $chef->delete();
        return back()->with("successDelete", "Chef-fillière supprimé avec succè!");
    }
    
    
    public function search(Request $Request)
    {
        $search_text = $Request->query('query');

        $chef = Chef::find(auth()->id());
        $fillière = $chef->fillière;
        $students = students::where('fillière_id',$fillière)
        ->where('nom','LIKE' , '%'.$search_text.'%')
        ->select('nom','prénom','email')
        ->get();


        return view('chef.search', compact('students'));
    }

    public function showModules() {
        $chef = Chef::find(auth()->id()); 
        $filiere = $chef->filiere;
        $modules = $filiere->modules;
    
        return view('chef/Cours', compact('modules', 'fillière'));
    }
}
