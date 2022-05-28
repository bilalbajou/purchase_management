<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frnAdminController extends Controller
{
        public function index(){
          $frns=DB::table('view_frn_v2')->get();
        return view('admin.frn',compact('frns'));
    }
}
