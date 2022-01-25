<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Depense;
use Illuminate\Support\Facades\DB;

class DepenseController extends Controller
{
    public function listDepenses() {
        $data = [
            'depenses' => Depense::all()
        ];
        return view('Admin.Depenses.listDepenses')->with($data);
        
    }

    function addData(Request $request){

        $depense= new Depense;
        $depense->type=$request->type;
        $depense->montant=$request->montant;
        $depense->save();
        return redirect('depenses/add');
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
                    $view='Admin.Depenses.addDepenses';
                    break;
                case 'edit':
                    $view='Admin.Depenses.addDepenses';
                    $data['depense']=Depense::find($p2);
                    break;
                case 'delete':
                    break;
                case null:
                    $data = [
                        'depenses' => Depense::all()
                    ];
                    $view='Admin.Depenses.listDepenses';
                    break;
                default:
                    return redirect('depenses');
                    break;
            }
            
            // return $data;

            return view($view)->with($data);
        }else if ($request->isMethod('POST')){
            switch ($p1) {
                case 'add':
                    $depense= new Depense;
                    $depense->type=$request->type;
                    $depense->montant=$request->montant;
                    $depense->save();
                    return redirect('depenses/add');
                    break;
                case 'edit':
                    $depense= Depense::find($p2);
                    $depense->type=$request->type;
                    $depense->montant=$request->montant;
                    $depense->save();
                    return redirect('depenses/add');
                    break;
                case 'delete':
                    $depense= Depense::find($p2);
                    $depense->delete();
                    return redirect('depenses/add');
                    break;
                case null:
                    $data = [
                        'depenses' => Depense::all()
                    ];
                    $view='Admin.Depenses.listDepenses';
                    break;
                default:
                    return redirect('depenses');
                    break;
            }
            
            
            return view($view)->with($data);
        }
    }


}
