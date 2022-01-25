<?php

namespace App\Http\Controllers;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//use Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(Request $request){
        //return $request->session()->get('user');
        if($request->isMethod('GET')){
            if(session()->get('user')['nature']== 'admin'){
                return redirect('abonnes');
            }else if(session()->get('user')['nature']== 'abonne'){
                return redirect('reclamations/add');
            }
            return view('Authentification.login');
        }else{
            // POST
            $login=$request->input('email');
            $password=$request->input('password');
            $data=DB::table('admins')
                    ->where('email','=',$login)
                    ->where('password','=',$password)
                    ->select(['id','nom'])
                    ->get();

            if(count($data)>0){
                $request->session()->put('user',['id'=>$data[0]->id, 'nom'=>$data[0]->nom,'nature'=>'admin']);
               return redirect('abonnes');
            }else{
                $data=DB::table('abonnes')
                    ->where('email','=',$login)
                    ->where('mdp','=',$password)
                    ->select(['id','nom'])
                    ->get();
                if(count($data)>0){
                    $request->session()->put('user', ['id'=>$data[0]->id, 'nom'=>$data[0]->nom,'nature'=>'abonne']);
                    return redirect('abonnes');
                }else{
                    return view("Authentification.login")->with(["message"=>"Veuillez verifier l'email et le mot de passe"]);//;
                }
            }
        }
        
    }

   
    
}