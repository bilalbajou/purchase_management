<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class profilController extends Controller
{
    public function index(){
            $user=Auth::user();
            return view('editProfile',compact('user'));
    } 
    public function update(Request $request){
           $user=  User::find(Auth::user()->id);
           DB::table('users')->where('id',$user->id)->update(['name'=>$request->input('name')]);
           DB::table('users')->where('id',$user->id)->update(['first_name'=>$request->input('first_name')]);
           DB::table('users')->where('id',$user->id)->update(['email'=>$request->input('email')]);
                  
           return  redirect()->route('profil.index')->with('success','La modification est réussi');

    }
       public function update_pass(Request $request){
                
                $email=Auth::user()->email;
                if($email!=$request->input('email')){
                         return redirect()->route('profil.index')->withErrors('Nous ne trouvons pas d\'utilisateur avec cette adresse e-mail.');
                }
                else{
                    $validated = $request->validate([
                        'pass' => 'confirmed|min:8',
                    ]);
                       DB::table('users')->where('id',Auth::user()->id)->update(['password'=>$request->input('pass')]);
                      return  redirect()->route('profil.index')->with('success','La modification du mot de passe est réussi');

                }
       }
}
