<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frnAdminController extends Controller
{
        public function index(){
          $frns=DB::table('frn_view_v2')->paginate(10);
        return view('admin.frn',compact('frns'));
    }
}
