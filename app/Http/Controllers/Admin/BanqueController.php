<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Banque;
use Illuminate\Support\Facades\DB;

class BanqueController extends Controller
{
    public function listBanques() {
        $data = [
            'banques' => Banque::all()
        ];
        return view('Admin.Banques.listBanques')->with($data);
        
    }

    function addData(Request $req){

        $banque= new Banque;
        $banque->nom=$req->nom;
        $banque->mensualite=$req->mensualite;
        $banque->save();
        return redirect('banques/add');
    }


    
    public function index($p1=null,$p2=null,$p3=null,Request $request){
        $view=null;
        $data=null;
        $data['p1']=$p1;
        $data['p2']=$p2;
        $data['p3']=$p3;
        if($request->isMethod('GET')){
            switch ($p1) {
                case 'add':
                    $view='Admin.Banques.addBanques';
                    break;
                case 'edit':
                    $view='Admin.Banques.addBanques';
                    $data['banque']=Banque::find($p2);
                    break;
                case 'delete':
                    break;
                case null:
                    $data = [
                        'banques' => Banque::all()
                    ];
                    $view='Admin.Banques.listBanques';
                    break;
                default:
                    return redirect('banques');
                    break;
            }
            

            return view($view)->with($data);
        }else if ($request->isMethod('POST')){
            switch ($p1) {
                case 'add':
                    $banque= new Banque;
                    $banque->nom=$request->nom;
                    $banque->numero=$request->numero;
                    $banque->save();
                    return redirect('banques/add');
                    break;
                case 'edit':
                    $banque= Banque::find($p2);
                    $banque->nom=$request->nom;
                    $banque->numero=$request->numero;
                    $banque->save();
                    return redirect('banques/add');
                    break;
                case 'delete':
                    $banque= Banque::find($p2);
                    $banque->delete();
                    return redirect('banques/add');
                    break;
                case null:
                    $data = [
                        'banques' => Banque::all()
                    ];
                    $view='Admin.Banques.listBanques';
                    break;
                default:
                    return redirect('banques');
                    break;
            }
            
            
            return view($view)->with($data);
        }
    }
}
