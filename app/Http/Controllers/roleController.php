<?php

namespace App\Http\Controllers;

use App\Models\achat;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Switch_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class roleController extends Controller
{ 

        public function index(Request $request){
            $role=Auth::user()->type_utilisateur;
            $etat=Auth::user()->etat_compte;
            $i=0;
            $j=0;
            $nb_achats=achat::all()->count();
            $nb_frns=fournisseur::all()->count();
            $agents=DB::table('view_agent')->get();
            $frns=DB::table('frn_view_details')->get();
            $montant_achats=DB::table('montant_view')->first();
            switch($etat) {
                case 'A':
                 if($role=="agent")
                 return redirect()->route('achats.index');
                 else if($role=="admin")
                 return view('admin.dashboard',['nb_achats'=>$nb_achats,'nb_frns'=>$nb_frns,'montant_achats'=>$montant_achats,'agents'=>$agents,'frns'=>$frns,'i'=>$i,'j'=>$j]);
                 else 
                 abort(403);break;
                case 'D':
                  return redirect('/')->with('error','Votre compte est désactivé');

            }
    
        }
  }

