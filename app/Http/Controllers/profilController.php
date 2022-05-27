<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profilController extends Controller
{
    public function index(){
            $user=Auth::user();
            return view('agent.editProfile',compact('user'));
    } 
    public function redirectBack(){
        return redirect()->back();
    }
}
