<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class achatsAdminController extends Controller
{
       public function index(){
        $frns=DB::table('frn_view')->get();
        $achats=DB::table('achats_view_v2')->paginate(8);
        $i=0;
        return view('admin.achats',compact('achats'),compact('frns'))->with('i',$i);
       }
}
