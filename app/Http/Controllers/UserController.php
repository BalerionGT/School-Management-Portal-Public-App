<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $Request)
    {
        $search_text = $Request->query('query');
        $users = User::where('name' ,'LIKE' , '%'.$search_text.'%')
        ->orwhere('email','LIKE' , '%'.$search_text.'%')
        ->get();
        return view('AdminViews.search', compact('users'));
    }
    
}
