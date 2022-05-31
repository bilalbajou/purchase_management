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

        public function index(){
            $role=Auth::user()->type_utilisateur;
            $etat=Auth::user()->etat_compte;
            $nb_achats=achat::all()->count();
            $nb_frns=fournisseur::all()->count();
            $agents=DB::table('view_agent')->get();
            $frns=DB::table('frn_view_details')->get();

            $montant_achats=DB::select('select montant_achats()');
             $wheather=Http::withHeaders([
                'X-RapidAPI-Host' => 'yahoo-weather5.p.rapidapi.com',
                'X-RapidAPI-Key' => '04e4c6a56emshd0b636fcfc9635dp1b746bjsn067950035424'
             ])->get('https://yahoo-weather5.p.rapidapi.com/weather?location='.'paris'.'&format=json&u=f');
             $wheather=$wheather->json();
             $wheather_text=$wheather['forecasts'][0]['text'];
            switch($etat) {
                case 'A':
                 if($role=="agent")
                 return view('agent.dashboard');
                 else if($role=="admin")
                 return view('admin.dashboard',['nb_achats'=>$nb_achats,'nb_frns'=>$nb_frns,'montant_achats'=>$montant_achats,'wheather'=>$wheather,'wheather_text'=>$wheather_text,'agents'=>$agents,'frns'=>$frns]);
                 else 
                 abort(403);break;
                case 'D':
                  return redirect('/')->withErrors('Votre compte est désactivé');

            }
    
        }
  }

