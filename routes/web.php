<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. Thesepas
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
    
});
Route::get('login', [AuthController::class, 'login'])
->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])
->name('authenticate');
Route::get('logout', [AuthController::class, 'logout'])
->name('logout');


Route::middleware('auth')->group(function(){    
Route::get('dashboard/student', [DashboardController::class, 'Dstudent'])->name('dashboard.student');;
Route::get('dashboard/prof' ,[DashboardController::class, 'Dprof'])->name('dashboard.prof');
Route::get('dashboard/chef-fillière' ,[DashboardController::class, 'Dchef'])->name('dashboard.chef');
Route::get('dashboard/chef-fillière/emploie' ,[DashboardController::class, 'Echef'])->name('emploie.chef');

});

Route::get('dashboard/prof/cours', function(){ return view('prof.Cours');});

Route::get('dashboard/prof/cours/upload',[CoursController::class, 'index'])->name('Uploadcours');

Route::post('dashboard/prof/cours/upload' ,[CoursController::class, 'upload'])->name('Uploadcours.prof');

Route::get('/dashboard/prof/profil', function () {
    return view('prof/Profil');
})->name('ProfilProf');

Route::get('student/search', [StudentsController::class, 'search']);
Route::get('prof/search', [ProfController::class, 'search']);
Route::get('chef/search', [ChefController::class, 'search']);
Route::get('admin/search', [UserController::class, 'search']);

Route::middleware('admin')->group(function(){
    Route::get('Admin/dashboard', [DashboardController::class, 'Dadmin'])->name('dashboard.admin');
    Route::get('students/create', [StudentsController::class, 'create'])->name("students.create");
    Route::post('students/create', [StudentsController::class, 'ajouter'])->name("students.ajouter");
    Route::get('students', [StudentsController::class, 'index'])->name("students");
    Route::get('students/{student}', [StudentsController::class, 'edit'])->name("student.edit");
    Route::delete('students/{student}', [StudentsController::class, 'supprimer'])->name("student.supprimer");
    Route::put('students/{student}', [StudentsController::class, 'update'])->name("student.update");

    Route::get('prof/create', [ProfController::class, 'create'])->name("prof.create");
    Route::post('prof/create', [ProfController::class, 'ajouter'])->name("prof.ajouter");
    Route::get('prof', [ProfController::class, 'index'])->name("prof");
    Route::get('prof/{prof}', [ProfController::class, 'edit'])->name("prof.edit");
    Route::delete('prof/{prof}', [ProfController::class, 'supprimer'])->name("prof.supprimer");
    Route::put('prof/{prof}', [ProfController::class, 'update'])->name("prof.update");

    Route::get('chef-fillière', [ChefController::class, 'index'])->name("chef");
    Route::delete('chef/{chef}', [ChefController::class, 'supprimer'])->name("chef.supprimer");

    Route::get('option/create', [OptionController::class, 'create'])->name("option.create");
    Route::post('option/create', [OptionController::class, 'ajouter'])->name("option.ajouter");
    Route::get('option', [OptionController::class, 'index'])->name("option");
    Route::get('option/{option}', [OptionController::class, 'edit'])->name("option.edit");
    Route::delete('option/{option}', [OptionController::class, 'supprimer'])->name("option.supprimer");
    Route::put('option/{option}', [OptionController::class, 'update'])->name("option.update");

    Route::get('admin/dashboard/{year}/{fillière}', [StudentsController::class, 'show'])->name("show.students");

    Route::get('/admin/Filières/GL', function () {
        return view('AdminViews/AdminF_GL');
    })->name('admin.filiere.génie logiciel');
    
    Route::get('/admin/Filières/BI', function () {
        return view('AdminViews/AdminF_BI');
    })->name('admin.filiere.business intelligence & analytics');
    
    Route::get('/admin/Filières/2SCL', function () {
        return view('AdminViews/AdminF_2SCL');
    })->name('admin.filiere.smart supply chain & logistics');
    
    Route::get('/admin/Filières/SSI', function () {
        return view('AdminViews/AdminF_SSI');
    })->name("admin.filiere.sécurité des systèmes d'information");
    
    Route::get('/admin/Filières/SSE', function () {
        return view('AdminViews/AdminF_SSE');
    })->name('admin.filiere.smart system engineering');
    
    Route::get('/admin/Filières/IDSIT', function () {
        return view('AdminViews/AdminF_IDSIT');
    })->name('admin.filiere.ingénierie en data science and iot');
    
    Route::get('/admin/Filières/IDF', function () {
        return view('AdminViews/AdminF_IDF');
    })->name('admin.filiere.ingénierie digitale pour la finance');
    
    Route::get('/admin/Filières/2IA', function () {
        return view('AdminViews/AdminF_2IA');
    })->name('admin.filiere.intelligence artificielle');
    
    Route::get('/admin/Filières/GD', function () {
        return view('AdminViews/AdminF_GD');
    })->name('admin.filiere.génie de la data');

});


Route::get('element/create', [ElementController::class, 'create'])->name("element.create");
Route::post('element/create', [ElementController::class, 'ajouter'])->name("element.ajouter");
Route::get('year/module/element', [ElementController::class, 'index'])->name("element");
Route::get('module/{element}', [ElementController::class, 'edit'])->name("element.edit");
Route::delete('module/{element}', [ElementController::class, 'supprimer'])->name("element.supprimer");
Route::put('module/{element}', [ElementController::class, 'update'])->name("element.update");

Route::get('modules/create', [ModuleController::class, 'create'])->name('module.create');
Route::post('/modules/create', [ModuleController::class, 'ajouter'])->name("module.ajouter");
Route::get('/dashboard/chef/module', [ModuleController::class, 'index'])->name("module");
Route::get('/moduledit/{module}', [ModuleController::class, 'edit'])->name("module.edit");
Route::put('/moduleupdate/{module}', [ModuleController::class, 'update'])->name("module.update");
Route::delete('/moduledelete/{module}', [ModuleController::class, 'supprimer'])->name("module.supprimer");
Route::get('/module/{moduleId}', [ModuleController::class, 'index'])->name('module.view');



Route::get('/password/forgot' , [StudentsController::class,'showForgotForm'])->name('forgot.password.form');
Route::post('/password/forgot' ,[StudentsController::class, 'sendResetLink'])->name('forgot.password.link');
Route::get('password/reset/{token}' ,[StudentsController::class ,'showResetForm'])->name('reset.password.form');
Route::post('/password/reset' ,[StudentsController::class, 'resetPassword'])->name('reset.password');




//calendar routes
Route::get('calendar/indexChef', [CalendarController::class, 'indexChef'])->name('calendar.chef');
Route::get('calendar/indexEleve', [CalendarController::class, 'indexEleve'])->name('calendar.eleve');
Route::get('calendar/indexProf', [CalendarController::class, 'indexProf'])->name('calendar.prof');
Route::post('full-calender/action', [CalendarController::class, 'action'])->name('calendar.action');
Route::get('/calendar/fetchseances', [CalendarController::class, 'fetchseances'])->name('calendar.fetchseances');




//profile routes
Route::get('/dashboard/prof/profil', [ProfilController::class, 'profilprof'])->name('profil.prof');
Route::get('/dashboard/student/profil', [ProfilController::class, 'profileleve'])->name('profil.eleve');
Route::get('/dashboard/chef/profil', [ProfilController::class, 'profilchef'])->name('profil.chef');



Route::get('/dashboard/chef-fillière/modules', [FiliereController::class, 'listeModules'])->name('modules.liste');


//test
// Route::get('/cour', [
//    'uses' => 'App\Http\Controllers\CoursController@index',
//    'as' => 'student.Cours',
//    'middleware'=> 'roles',
//    'roles' => ['prof']
//]);

//chef cours routes

Route::get('/dashboard/chef-fillière/cours/{filiere_id}', [ChefController::class, 'showModules'])->name('cours');
Route::get('/get-modules', [ModuleController::class, 'getModules'])->name('get-modules');

Route::get('/dashboard/student/cours', [CoursController::class, 'showCourse'])->name('file.show');
Route::get('/download/{file}', [CoursController::class, 'download'])->name('file.download');

//edit profil rout
Route::get('/profile/edit', [ProfilController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfilController::class, 'update'])->name('profile.update');

Route::post('/profile/edit', [ProfilController::class, 'editeleve'])->name('eleve.edit');
Route::put('/profile/update', [ProfilController::class, 'updateeleve'])->name('eleve.update');

Route::get('/profile/edit', [ProfilController::class, 'editchef'])->name('chef.edit');
Route::put('/profile/update', [ProfilController::class, 'updatechef'])->name('chef.update');



