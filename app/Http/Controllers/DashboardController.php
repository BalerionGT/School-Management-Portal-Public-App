<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Dstudent()
    {
        $liste_students = students::orderBy("nom", "asc")->paginate(8);
        $student = students::find(Auth::id());
        $notifications = DB::table('notifications')
        ->where('notifiable_id',Auth::id())
        ->select('*')
        ->get();


        return view('dashboard',compact('liste_students','notifications'));
    }
    public function Dprof()
    {
        return view('prof.profdashboard');
    }
    public function Dchef()
    {
        $chef = Chef::find(Auth::id());

        $modules = DB::table('modules')
        ->join('fillières_modules', 'modules.id', '=', 'fillières_modules.module_id')
        ->where('fillières_modules.fillière_id', $chef->fillière)
        ->select('*')
        ->get();

        return view('chef.chefdashboard', compact('modules'));
    }
    public function Echef()
    {
        
        return view('chef.Emploie');
    }
    public function Dadmin()
    {
        $all_options = DB::table('fillières');
        $options = DB::table('fillières')->count();
        $students = DB::table('students')->count();
        $profs = DB::table('professors')->count();
        $chefs = DB::table('professors')->where('chef','=', 1)->count();
        
        return view('AdminViews.Admindashboard', compact('options','students','profs', 'chefs','all_options'));
    }
}
