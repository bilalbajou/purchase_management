<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\infoAgent;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class agentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=DB::table('users')->where('type_utilisateur','agent')->paginate(8);
        $i=0;
        return view('admin.agent',compact('user'))->with('i',$i);
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
            
           $all_users=User::all();
           foreach($all_users as $value){
                 if($value->email==$request->email)
                   return redirect()->route('agents.index')->withErrors('Email existe déjà');break;
           }
          $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
          $password = substr($random, 8, 10);
          $user=new User();
          $user->name=$request->input('nom');
          $user->first_name=$request->input('prenom');
          $user->email=$request->input('email');
          $user->type_utilisateur=$request->get('type');
          $user->password=Hash::make($password);
          $user->etat_compte="A";
          $user->save();
          Mail::to($user->email)->send(new infoAgent($user,$password));
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
    public function exportPdf(){
        $agent=DB::table('users')->where('type_utilisateur','agent')->get();
         view()->share('agent',$agent);
        $pdf = PDF::loadView('admin.pdfListeAgent',compact('agent'));
        return  $pdf->download('liste_des_agents.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function activer($id){
             $user=User::find($id);
             $user->etat_compte="A";
             $user->save();
             return  redirect()->back()->with('success','Activation du compte est réussi');

    }
    public function desactiver($id){
        $user=User::find($id);
        $user->etat_compte="D";
        $user->save();
        return  redirect()->back()->with('success','Désactivation du compte est réussi');
    }
}
