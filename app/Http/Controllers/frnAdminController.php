<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frnAdminController extends Controller
{
        public function index(){
          $i=0;
          $frns=DB::table('fournisseurs')
          ->join('achats', 'fournisseurs.id_frn', '=', 'achats.fournisseur')
          ->select('fournisseurs.id_frn', 'fournisseurs.nom', 'fournisseurs.adresse', 'fournisseurs.telephone', 'achats.libellé', 'achats.montant_total')
          ->whereColumn('fournisseurs.id_frn', '=', 'achats.fournisseur')
          ->paginate(10);

        return view('admin.frn',compact('frns'))->with('i',$i);
    }
}
