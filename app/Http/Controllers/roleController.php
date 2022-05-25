<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roleController extends Controller
{ 

        public function index(){
            $role=Auth::user()->type_utilisateur;
            $etat=Auth::user()->etat_compte;
            if(($role=="agent")&&($etat=="A")){
                return view('agent.dashboard');
            }
            else if(($role=="admin")&&($etat=="A")){
                return view('admin.dashboard');
            }
            else 
             abort('403');
        }
  }

