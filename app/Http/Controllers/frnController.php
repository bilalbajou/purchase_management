<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class frnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $frns=fournisseur::paginate(5);
        return view('agent.fournisseur',compact('frns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $frn=new fournisseur();
           $frn->nom=$request->input('nom');
           $frn->adresse=$request->input('adr');
           $frn->telephone=$request->input('tel');
           $frn->save();
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
          $frn=DB::table('fournisseurs')->where('id_frn',$id)->first();
          return view('agent.update.frnEdit',compact('frn'));
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
        $frn=fournisseur::find($id);
        $frn->nom=$request->input('nom');
        $frn->adresse=$request->input('adr');
        $frn->telephone=$request->input('tel');
         $frn->save();
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
          $frn=DB::table('achats')->where('fournisseur',$id);
          if($frn->count()>0){
                 return redirect()->route('fournisseurs.index')->withErrors('Vous ne pouvez pas supprimer un fournisseur a des achats');
          }
          DB::table('fournisseurs')->where('id_frn',$id)->delete();
          return redirect()->back()->with('success','suppression réussi');
    }
    public function exportPdf(){
    
        $frns=DB::table('fournisseurs')->get();
         view()->share('achats',$frns);
        $pdf = PDF::loadView('agent.pdfListeFrn',compact('frns'));
        return  $pdf->download('liste_des_fournisseurs.pdf');
    }
}
