<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Recette;
use App\Models\Abonne;
use Illuminate\Support\Facades\DB;

class RecetteController extends Controller
{
    public function listRecettes() {
        $data = [
            'recettes' => Recette::all()
        ];
        // return $data;
        return view('Admin.Recettes.listrecettes')->with($data);
        
    }

    function addData(Request $req){
        $recette= new Recette;
        $recette->numero_de_piece=$req->numero_de_piece;
        $recette->abonne_id=$req->abonne_id;
        $recette->date=$req->date;
        $recette->periode=$req->periode;
        $recette->type_de_payement=$req->type_de_payement;
        $recette->save();
        return redirect('recettes/add');
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
                    $view='Admin.Recettes.addRecettes';
                    $data['abonnes']=Abonne::all();
                    break;
                case 'edit':
                    $view='Admin.Recettes.addRecettes';
                    $data['abonnes']=Abonne::all();
                    $data['recette']=Recette::find($p2);
                    break;
                case 'delete':
                    break;
                case null:
                    $data = [
                        'recettes' => Recette::all()
                    ];
                    $view='Admin.Recettes.listRecettes';
                    break;
                default:
                    return redirect('recettes');
                    break;
            }
            
            // return $data;

            return view($view)->with($data);
        }else if ($request->isMethod('POST')){
            switch ($p1) {
                case 'add':
                    $recette= new Recette;
                    $recette->numero_de_piece=$request->numero_de_piece;
                    $recette->abonne_id=$request->abonne_id;
                    $recette->date=$request->date;
                    $recette->periode=$request->periode;
                    $recette->type_de_payement=$request->type_de_payement;
                    $recette->save();
                    return redirect('recettes/add');
                    break;
                case 'edit':
                    $recette= Recette::find($p2);
                    $recette->numero_de_piece=$request->numero_de_piece;
                    $recette->abonne_id=$request->abonne_id;
                    $recette->date=$request->date;
                    $recette->periode=$request->periode;
                    $recette->type_de_payement=$request->type_de_payement;
                    $recette->save();
                    return redirect('recettes/add');
                    break;
                case 'delete':
                    $recette= Recette::find($p2);
                    $recette->delete();
                    return redirect('recettes/add');
                    break;
                case null:
                    $data = [
                        'recettes' => Recette::all()
                    ];
                    $view='Admin.Recettes.listRecettes';
                    break;
                default:
                    return redirect('recettes');
                    break;
            }
            
            
            return view($view)->with($data);
        }
    }

}
