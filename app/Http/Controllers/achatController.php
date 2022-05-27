<?php

namespace App\Http\Controllers;

use App\Models\achat;

use Barryvdh\DomPDF\Facade as PDF;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class achatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $agent=Auth::user()->id;
      $frns=DB::table('frn_view')->get();
      $achats=DB::table('achats_view')->where('Agent',Auth::user()->id)->get();
      return view('agent.achat',compact('frns'),compact('achats'))->with('agent',$agent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $achat = new achat();
        $achat->libellé=$request->input('libll');
        $achat->date_achat=$request->input('achatDate');
        $achat->montant_total=$request->input('montant');
        $achat->Agent=Auth::user()->id;
        $achat->fournisseur=$request->get('frn');
        if($request->file('bon')){
            $bon=$request->file('bon');
            $achat->bon=$bon->getClientOriginalName();
            $bon->move('bon',$bon->getClientOriginalName());
        }
        $achat->save();

        return  redirect()->back()->with('success','Le sauvegarde est réussi');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent=Auth::user()->id;
        $frns=DB::table('frn_view')->get();
          $achat=DB::table('achats')->where('id_achat',$id)->first();
          return view('agent.update.achatEdit',compact('achat'),compact('frns'))->with('agent',$agent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $achat=achat::find($id);
         $achat->libellé=$request->input('libll');
         $achat->date_achat=$request->input('date_achat');
         $achat->montant_total=$request->input('montant');
         $achat->fournisseur=$request->get('frn');
         $achat->Agent=Auth::user()->id;
         if($request->file('bon')){
         $bon=$request->file('bon');
         $achat->bon=$bon->getClientOriginalName();
         $bon->move('bon',$bon->getClientOriginalName());
           }
         $achat->save();
          
         return  redirect()->back()->with('success','Le modification est réussi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          DB::table('achats')->where('id_achat',$id)->delete();
          return redirect()->back()->with('success','suppression réussi');
    }
}
