<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class achatsAdminController extends Controller
{
       public function index(){
        $achats=DB::table('achats_view_v2')->get();
        return view('admin.achats',compact('achats'));
       }
}
