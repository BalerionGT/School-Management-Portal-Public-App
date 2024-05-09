<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\User;
use App\Models\Fillière;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfController extends Controller
{
    public function index()
    {
        $liste_profs = Professor::orderBy("nom", "asc")->paginate(8);
    
        return view('Professors', compact("liste_profs"));
    }
    
    public function create()
    {
        $list_fillières = Fillière::all();
        return view("createProf", compact("list_fillières"));
    }
    public function ajouter(Request $request)
    {
        $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "email"=>"required",
            "password"=>"required",
            "chef"=>"required"
        ]);
        
        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => 0,
            'chef' => $request->chef
        ]);

        Professor::create([
            'id' =>$user->id,
            "nom"=>$request->nom,
            "prenom"=>$request->prenom,
            "email"=>$request->email,
            "chef"=>$request->chef,
            "password"=>Hash::make($request->password),
        ]);

        $prof = User::find($user->id);

        if($prof->chef){
            $prof->roles()->attach(3);
                Chef::create([
                        'id' =>$user->id,
                        "nom"=>$request->nom,
                        "prénom"=>$request->prenom,
                        "email"=>$request->email,
                        "fillière"=>$request->fillière,
                        "password"=>Hash::make($request->password),
                ]);

        }
            else{
                $prof->roles()->attach(2);
            }

        return back()->with("success","Professeur ajouté avec succè!");
    }
    public function supprimer(Professor $prof)
    
    {
        $chef = Chef::find($prof->id);
        $user = User::find($prof->id);

        if ($chef) {
            $chef->delete();
        }

        if ($user) {
            $user->delete();
        }

        $prof->delete();

        return back()->with("successDelete", "Professeur supprimé avec succès !");
    }

    public function update(Professor $prof, Request $request)
    {
        $request->validate([
            'nom'=>"required",
            'prenom'=>"required",
            'email'=>"required",
            'chef'=>"required",
            'password'=>"required",
        ]);
        
        $user = User::find($prof->id);

        
        if(Chef::find($prof->id)){

            $chef = Chef::find($prof->id);

            if($request->chef == 1){
            
                $chef->update([
                    'nom'=>$request->nom,
                    'prénom'=>$request->prenom,
                    'email'=>$request->email,
                    'fillière'=>$request->fillière,
                    'password'=>Hash::make($request->password),            
            ]);
            }

            else{
                $user->roles()->detach();
                $chef->delete();
                $user->roles()->attach(2);
            }
        }
        else{
            
            if($request->chef == 1){
                
                Chef::create([

                    'id' => $user->id,
                    'nom'=> $request->nom,
                    'prénom'=> $request->prenom,
                    'email'=> $request->email,
                    'fillière'=> $request->fillière,
                    'password'=>Hash::make($request->password),
                ]);
                $user->roles()->attach(3);
            }
        }
                $prof->update([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'chef' => $request->chef,
                    'password'=>Hash::make($request->password),
                ]);

        $user->update([
            'name' => $request->nom,
            'email' => $request->email,
            'chef' => $request->chef,
            'password' => Hash::make($request->password)
        ]);
        return back()->with("successUpdate", "Professeur modifié avec succès!");
    }

    public function edit(Professor $prof)
    {
        $filieres = Fillière::all();
        return view("editprof",compact("prof","filieres"));
    }

    public function search(Request $Request)
    {
        $search_text = $Request->query('query');
        $profs = User::where('name' ,'LIKE' , '%'.$search_text.'%')
        ->orwhere('email','LIKE' , '%'.$search_text.'%')
        ->get();

        return view('prof.search', compact('profs'));
    }
}
