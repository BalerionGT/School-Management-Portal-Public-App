<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profilprof()
    {
        return view('prof.profilprof');
    }
    public function profileleve()
    {
        $notifications = DB::table('notifications')
        ->where('notifiable_id',Auth::id())
        ->select('*')
        ->get();
        return view('student.profileleve',compact('notifications'));
    }
    public function profilchef()
    {
        Chef::find(Auth::id());
        $chef = Chef::find(Auth::id());
        $modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
        ->where('fillières_modules.fillière_id', $chef->fillière)
        ->select('*')
        ->get();

        return view('chef.profilchef',compact("modules"));
    }

    public function edit()
    {
        return view('prof.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Update the user's profile information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        
        $user->save();

        // Redirect the user to the profile page with a success message
        return redirect()->route('profil.prof')->with('success', 'Profil mis à jour avec succès.');
    }

    public function editeleve()
    
    {
        $notifications = DB::table('notifications')
        ->where('notifiable_id',Auth::id())
        ->select('*')
        ->get();

        return view('student.edit',compact("notifications"));
    }

    public function updateeleve(Request $request)
    {
        $user = Auth::user();

        // Update the user's profile information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->save();


        // Redirect the user to the profile page with a success message
        return redirect()->route('profil.eleve')->with('success', 'Profil mis à jour avec succès.');
    }

    public function editchef()
    
    {
        $notifications = DB::table('notifications')
        ->where('notifiable_id',Auth::id())
        ->select('*')
        ->get();

        $chef = Chef::find(Auth::id());
        $modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
        ->where('fillières_modules.fillière_id', $chef->fillière)
        ->select('*')
        ->get();
        return view('chef.edit',compact("notifications","modules"));
    }

    public function updatechef(Request $request)
    {
        $user = Auth::user();

        // Update the user's profile information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->save();


        // Redirect the user to the profile page with a success message
        return redirect()->route('profil.chef')->with('success', 'Profil mis à jour avec succès.');
    }



}
