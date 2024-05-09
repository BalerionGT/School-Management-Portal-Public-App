<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Fillière;
use App\Models\students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CoursController extends Controller
{
    public function upload(Request $Request){
        if($Request->file('file') == NULL){
            return redirect()->route('Uploadcours.prof')->withErrors('Il faut déposer un fichier');
        }
        else{
            $Request->file('file')->store('Uploads/'.$Request->input('year'). '/' . $Request->input('filliere'),'public');
            return redirect()->route('Uploadcours.prof');
        }
    }
    public function index()
    {
        $liste_fillière = DB::select('SELECT * FROM fillières');
        $liste_module = DB::select('SELECT * FROM modules');

    return view('prof.UploadCours', compact('liste_fillière', 'liste_module'));

}

public function showCourse()
{
    $notifications = DB::table('notifications')
			->where('notifiable_id',Auth::id())
			->select('*')
			->get();
    $student = Students::find(Auth::id());

    if ($student) {
        $fillière = Fillière::find($student->fillière_id);
        if ($fillière) {
            $directory = public_path('storage/Uploads/'.$student->year.'/'.$fillière->id);
            $files = File::files($directory);
            return view('student.cours', compact('files','notifications'));
        }
    }
    return redirect()->back()->with('error', 'Error retrieving student or fillière data.');
}


    
public function download($file)
{
    $student = Students::find(Auth::id());
    $fillière = Fillière::find($student->fillière_id);

    $filePath = public_path('storage/Uploads/'.$student->year.'/'.$fillière->id.'/'.$file);
    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->with('error', 'File not found.');
    }
}
    }


