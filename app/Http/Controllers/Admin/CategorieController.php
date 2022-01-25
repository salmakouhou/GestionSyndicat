<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
{
    public function listCategories() {
        $data = [
            'categories' => Categorie::all()
        ];
        return view('Admin.Categories.listCategories')->with($data);
        
    }

    function addData(Request $req){

        $categorie= new Categorie;
        $categorie->nom=$req->nom;
        $categorie->mensualite=$req->mensualite;
        $categorie->save();
        return redirect('categories/add');
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
                    $view='Admin.Categories.addCategories';
                    break;
                case 'edit':
                    $view='Admin.Categories.addCategories';
                    $data['categorie']=Categorie::find($p2);
                    break;
                case 'delete':
                    break;
                case null:
                    $data = [
                        'categories' => Categorie::all()
                    ];
                    $view='Admin.Categories.listCategories';
                    break;
                default:
                    return redirect('categories');
                    break;
            }
            
            // return $data;

            return view($view)->with($data);
        }else if ($request->isMethod('POST')){
            switch ($p1) {
                case 'add':
                    $categorie= new Categorie;
                    $categorie->nom=$request->nom;
                    $categorie->mensualite=$request->mensualite;
                    $categorie->save();
                    return redirect('categories/add');
                    break;
                case 'edit':
                    $categorie= Categorie::find($p2);
                    $categorie->nom=$request->nom;
                    $categorie->mensualite=$request->mensualite;
                    $categorie->save();
                    return redirect('categories/add');
                    break;
                case 'delete':
                    $categorie= Categorie::find($p2);
                    $categorie->delete();
                    return redirect('categories/add');
                    break;
                case null:
                    $data = [
                        'categories' => Categorie::all()
                    ];
                    $view='Admin.Categories.listCategories';
                    break;
                default:
                    return redirect('categories');
                    break;
            }
            
            
            return view($view)->with($data);
        }
    }
}
