<?php

namespace App\Http\Controllers;

use App\Models\Fillière;
use App\Models\Role;
use Carbon\Carbon;
use App\Models\User;
use App\Models\students;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class StudentsController extends Controller
{
    public function index()
{
    $liste_students = students::orderBy("nom", "asc")->paginate(8);


    return view('students', compact("liste_students"));
}

public function create()
{
    $liste_fillières = Fillière::all();

    return view("createStudent", compact("liste_fillières"));
}
public function ajouter(Request $request)
{

    $request->validate([
        "nom"=>"required",
        "prénom"=>"required",
        "email"=>"required",
        "password"=>"required",
        "year"=>"required",
        "fillière_id"=>"required"
    ]);

    $user = User::create([
        'name' => $request->nom,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'admin' => 0,
        'chef' => 0,
        'phone'=> $request->phone
    ]);
    
    students::create([
        'id' =>$user->id,
        "nom"=>$request->nom,
        "prénom"=>$request->prénom,
        "email"=>$request->email,
        "password"=>Hash::make($request->password),
        "year"=>$request->year,
        "fillière_id" => $request->fillière_id
    ]);
    

    $user = User::find($user->id);
    $user->roles()->attach(1);


    return back()->with("success","Etudiant ajouté avec succè!");
}


public function supprimer(students $student)
{
    $user = User::find($student->id);
    $user->delete();
    $student->delete();
    return back()->with("successDelete", "Etudiant supprimé avec succè!");
}



public function update(students $student, Request $request)
{
    
    $request->validate([
        "nom"=>"required",
        "prénom"=>"required",
        "email"=>"required",
        "password"=>"required",
        "year"=>"required"
    ]);
     
    $student->update([
        "nom" => $request->nom,
        "prénom"=>$request->prénom,
        "email"=>$request->email,
        "password"=> Hash::make($request->password),
        "year"=>$request->year
    ]);

    $user = User::find($student->id);

    $user->update([
        'name' => $request->nom,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);


    return back()->with("successUpdate", "Etudiant modifié avec succès!");
}
public function edit(students $student)
{
    return view("editStudent",compact("student"));
}



public function search(Request $Request)
{
    $search_text = $Request->query('query');
    $students = students::where('name' ,'LIKE' , '%'.$search_text.'%')->get();

    return view('student.search', compact('students'));
}





public function showForgotForm(){
    return view('password.forgot');
}
public function sendResetLink(Request $request){
    $request->validate([
        "email"=>"required|email|exists:users,email"
    ]);
    $token = Str::random(64);
    Db::table('password_resets')->insert([
        'email'=>$request->email,
        'token'=>$token,
        'created_at'=>Carbon::now(),

    ]);
    $action_link = route('reset.password.form',['token'=>$token,'email'=>$request->email]);
    $body = "We are received a request to reset the password for<b>Your app Name</b> account associated with".$request->email.
    ".You can reset your password by clicking the link below";
    
    Mail::send('email-forgot',['action_link' => $action_link, 'body'=>$body], function($message) use ($request){
        $message->from('noreply@example.com','Your App Name');
        $message->to($request->email,'Your Name')
                ->subject('Reset Password');
    });
    return back()->with('success', 'We have e-mailed your password reset link!');
}
public function resetPassword(Request $request){
    $request->validate([
        'email'=>'required|email|exists:users,email',
        'password'=>'required|min:5|confirmed',
        'password_confirmation'=>'required',
    ]);
    $check_token = DB::table('password_resets')->where([
        'email'=>$request->email,
        'token'=>$request->token,
    ])->first();

    if($check_token){
        return back()->withInput()->with('fail', 'Invalid token');}
    else{
        User::where('email', $request->email)->update([
            'password'=>Hash::make($request->password)
        ]);
        DB::table('password_resets')->where([
            'email'=>$request->email
        ])->delete();
        return redirect()->route('login')->with('info','Your password has been changed! You can login with new password')
        ->with('verifiedEmail', $request->email);
    }
    
}
public function showResetForm(Request $request, $token =null){
    return view('password.reset')->with(['token'=>$token ,'email' =>$request->email]);
}

public function show(Request $request)
{
    $year = $request->year;
    $fillièreName = $request->fillière;

    // Retrieve the fillière by name
    $fillière = Fillière::where('nom', $fillièreName)->first();

    // Retrieve students associated with the fillière and year
    $students = $fillière->students()->where('year', $year)->get();

    $students = $fillière->students()->where('year', $year)->get();

    // Return the students to the view
    return view('student.show', ['students' => $students], compact('year','fillièreName'));
}
}
?>