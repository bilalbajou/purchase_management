<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Switch_;

class roleController extends Controller
{ 

        public function index(){
            $role=Auth::user()->type_utilisateur;
            $etat=Auth::user()->etat_compte;

            switch($etat) {
                case 'A':
                 if($role=="agent")
                 return view('agent.dashboard');
                 else if($role=="admin")
                 return view('admin.dashboard');
                 else 
                 abort(403);break;
                case 'D':
                  return redirect('/')->withErrors('Votre compte est désactivé');

            }
    
        }
  }

