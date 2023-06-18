<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class achatsAdminController extends Controller
{
       public function index(){
        $frns=DB::table('fournisseurs')
        ->select('id_frn', 'nom')
        ->get();
        $achats=DB::table('achats')
        ->join('fournisseurs', 'fournisseurs.id_frn', '=', 'achats.fournisseur')
        ->join('users', 'users.id', '=', 'achats.Agent')
        ->select('achats.id_achat', 'achats.libellé', 'achats.date_achat', 'achats.montant_total', 'fournisseurs.nom as fournisseur', DB::raw("concat(users.name, ' ', users.first_name) AS agent"), 'users.id as id_agent')
        ->paginate(10);
        $i=0;
        return view('admin.achats',compact('achats'),compact('frns'))->with('i',$i);
       }
}
